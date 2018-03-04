<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of CalcSub
 *
 * @author mrgab
 */
class CalcSub implements \App\Interfaces\OperatorInterface{

    public function run($number, $result) {
        return $result - $number;
    }
}
