<?php

namespace App\Http\Controllers;

use App\Models\GameParameterModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test(){
        return view('test2',[
            'template' => json_decode(GameParameterModel::where('p_name', 'game_template')->first()->p_value),
            'matrix' => json_decode(GameParameterModel::where('p_name', 'game_matrix')->first()->p_value),
            'fields' => GameParameterModel::where('p_name', 'game_fields_count')->first()->p_value,
        ]);
    }
    
    public function getGridMatrix(){

        
        // self::setNewMatrix(10,14);
        self::setNewMatrix(5,20);
        
        return 'true';

    }

    static public function setNewMatrix($rows,$columns){
        $matrix=[];
        $itemCount=1;
        $string ="";

        for ($i=1; $i <= $rows ; $i++) { 
            if($i == 1 || $i == $rows){
                for ($z=1; $z <= $columns ; $z++){
                    $string = $string . "x-" . $itemCount . " "; 
                    $itemCount++;
                }
            }

            if($i != 1 && $i != $rows){
                for ($z=1; $z <= $columns ; $z++){
                    if($z == 1 || $z == $columns){
                        $string = $string . "x-" . $itemCount . " ";
                        $itemCount++; 
                    }
                    if($z != 1 && $z != $columns){
                        $string = $string . "o "; 
                    }
                }
            }
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

    }
}
