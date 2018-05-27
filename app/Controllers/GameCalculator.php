<?php
namespace App\Controllers;

use App\Interfaces\OperatorInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameCalculator
 *
 * @author mrgab
 */
class GameCalculator {
    protected $result;
    protected $operation;

    public function setOperation(OperatorInterface $operation) {
        $this->operation = $operation;
        return $this;
    }

    public function calculation() {
    foreach (func_get_args() as $number) {
            if (is_int($number)) {
                $this->result = $this->operation->run($number, $this->result);
            } else {
               $error = 'Number test fail, please advise      -  THIS IS NOT INT -';
                throw new Exception($error);
            }
        }
    return $this;
    }

    public function getResult() {
        return $this->result;
    }
}
