<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GameParameterModel;
use App\Models\FieldParameterModel;
use App\Models\GamesModel;
use App\Models\UserInGameModel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function test(){
        dd(json_decode(GameParameterModel::where('p_name', 'game_matrix')->first()->p_value));
        return;
    }
    
    public function getGridMatrix(){
        //self::setNewGameBoardLayout(5,15);
        self::setNewGameBoardLayout(5,15);
        
        return 'true';
    }

    static public function setNewGameBoardLayout($rows,$columns){
        $matrix=[];
        $itemCount=1;
        $string ="";

        $dashBoardW = $columns % 2 == 0 ? 8 : 7;
        $dashBoardH = $rows % 2 == 0 ? 4 : 3;
        $dashBoardWStart = ($columns / 2 - $dashBoardW / 2)+1;
        $dashBoardHStart = ($rows / 2 - $dashBoardH / 2+1);

        //dd($dashBoardWStart, $dashBoardHStart);


        for ($i=1; $i <= $rows ; $i++) { 
            if($i == 1 || $i == $rows){
                for ($z=1; $z <= $columns ; $z++){
                    $string = $string . "field-" . $itemCount . " ";
                    $itemCount++;
                }
            }

            if($i != 1 && $i != $rows){
                for ($z=1; $z <= $columns ; $z++){
                    if($z == 1 || $z == $columns){
                        $string = $string . "field-" . $itemCount . " ";
                        $itemCount++; 
                    }
                    if($z != 1 && $z != $columns){
                        if (($i >= $dashBoardHStart && $i <$dashBoardHStart+$dashBoardH) && ($z >= $dashBoardWStart && $z <$dashBoardWStart+$dashBoardW)) {
                            $string = $string . "field-db ";
                        } else {
                            $string = $string . ". ";
                        }
                        
                    }
                }
            }
            //dump($string);
            $matrix[]=$string;
            $string="";
        }

        $template=[];
        $string="";

        for ($i=1; $i <= $rows; $i++) { 
            $string= $string . "1fr ";
        }
        $template=['rows' => $string]; $string="";

        for ($i=1; $i <= $columns; $i++) { 
            $string= $string . "1fr ";
        }
        $template['columns']=$string;

        GameParameterModel::where('p_name', 'game_matrix')
        ->update([
            'p_value' => json_encode($matrix),
        ]);

        GameParameterModel::where('p_name', 'game_template')
        ->update([
            'p_value' => json_encode($template),
        ]);

        GameParameterModel::where('p_name', 'game_fields_count')
        ->update([
            'p_value' => json_encode($itemCount-1),
        ]);

        for ($i=1; $i <= $itemCount-1 ; $i++) { 
            if(FieldParameterModel::where('field_name', 'field-'. $i)->where('p_name', 'background_color')->get()->count()){
                FieldParameterModel::where('field_name', 'field-'. $i)
                ->where('p_name', 'background_color')
                ->update(['p_value' => FieldParameterModel::FIELD_C]);
            }else{
                FieldParameterModel::create([
                    'field_name' => 'field-'. $i,
                    'p_name' => 'background_color',
                    'p_value' => 'background: rgb(34,193,195);background: linear-gradient(0deg, rgb(170, 40, 26) 0%, rgb(201, 139, 116) 100%)',
                ]);

            }
        }

    }

    public function index(){
        return view('admin.dashboard');
    }

    public function users(){
        return view('admin.users');
    }

    public function oneUser($id){
        return view('admin.user',['user' => User::where('id', $id)->first()]);
    }

    public function userUpdate(Request $request, $id){
        $user = User::where('id', $id)->first();
        if(isset($request['passwordReset'])){
            $user->update([
                'password' => Hash::make(User::RESET_PASS)
            ]);
            return redirect()->route('users')->with('success','User #'.$user->id.' password reset successfully');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('users')->with('success','User #'.$user->id.' has been updated successfully');
    }

    public function userDelete($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('users')->with('success','User #'.$user->id.' has been deleted successfully');
    }

    public function addNewUser(Request $request){
        $request['password']= Hash::make(User::RESET_PASS);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::create($request->all());
        return redirect()->route('users')->with('success','User: #'.$user->id.' - '.$user->name.', has been successfully added');
    }

    /**
     * Show the games module on admin side
     */
    public function games(){
        return view('admin.games');
    }

    /**
     * Crate a new empty game with status 0
     */
    public function createNewGame(Request $request){
        if ($request['createNewGame']) {
            GamesModel::create(['status' => GamesModel::STATUS_INITIALIZED]);
            return redirect()->route('games')->with('success','New game has been successfully created');
        }
    }

    public function startGame(Request $request, $id){
        if ($request['startGame']) {
            $game = GamesModel::where('id', $id);
            $game->update(['status' => GamesModel::STATUS_ACTIVE]);
            return redirect()->route('games')->with('success','Game: #'.$id.' successfully started');
        }
    }

    public function cancelGame(Request $request, $id){
        if ($request['cancelGame']) {
            $usersInGame = UserInGameModel::where('game_id', $id)->get();
            dump($usersInGame);
            foreach ($usersInGame as $user) {
                UserInGameModel::where('user_id', $user->user_id)->delete();
            }
            $game = GamesModel::where('id', $id);
            $game->update(['status' => GamesModel::STATUS_DISABLED]);
            return redirect()->route('games')->with('success','Game: #'.$id.' successfully canceled');
        }
    }

    
    
}
