<?php
namespace App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameUserAge
 *
 * @author mrgab
 */
class GameUserAge {

    public $UserAge;

    public function setUserAge($param) {
        if ($param > 0 && $param < 99 && is_int($param) && filter_var($param, FILTER_VALIDATE_FLOAT)) {
            $this->UserAge = $param;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUserAge() {
        return $this->UserAge;
    }
}
