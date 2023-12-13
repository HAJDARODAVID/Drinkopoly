<?php

namespace App\Http\Controllers;

use App\Models\FieldParameterModel;
use App\Models\GameParameterModel;
use Illuminate\Http\Request;

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
        //return view('admin.dashboard');
        return "users!!!";
    }
    
}
