<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of GameDificulty
 *
 * @author mrgab
 */
class GameDificulty {
    //put your code here

    public $current_dificulty;
    public $availableDificultyLevels;

    public function __construct() {
        $this->availableDificultyLevels =  ["easy", "medium", "hard", "nerd"];
    }


    public function  getGameDificulty(){
        return $this->current_dificulty;
    }

    public function  getGameAvailableDificulty(){
        return $this->availableDificultyLevels;
    }

public function setGameDificulty( string $newDif ){

    $clear_dif = trim($newDif);

    if(in_array($clear_dif, $this->availableDificultyLevels)){
         $this->current_dificulty = $clear_dif;
         return TRUE;
    }    else {
        return FALSE;
    }





}

}
