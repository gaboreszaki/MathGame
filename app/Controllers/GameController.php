<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of GameController
 *
 * @author mrgab
 */
class GameController {

    private $the_answer;
    private $the_question;
    private $param_one;
    private $param_two;
    private $min_num;
    private $max_num;
    private $operation;
    public static $operationsList = array("CalcAdd", "CalcDiv", "CalcMul", "CalcSub");
    private static $equationList = array("One", "Two", "Ope");
    private static $show_original_equation = FALSE;

    public function startGame() {

        ////
        $this_game = $this->setupGame();

        /* The Game operation
         *
         *          Basicly Generate the whole thing in one step -> SetupGame
         *          split the equlalision to parts (spoiler: $the_question , $the_answer)
         *
         */

        ///pick a random thing to hide:
        $selected_part_num = array_rand(self::$equationList, 1);

        $selected_part = self::$equationList["$selected_part_num"];


        ///make anwser to human visible
        if (in_array($this_game["$selected_part"], self::$operationsList)) {
            $str = $this_game["$selected_part"];
            $this->the_answer = trim($this->converseOperation($str));
        }
        else {
            $this->the_answer = $this_game["$selected_part"];
        }


        //print_r($this->the_answer);
        $the_other_parts = $this_game;

        $the_other_parts["$selected_part"] = "x";
        $this->the_question = $the_other_parts;



        return TRUE;
    }

    public function setupGame() {
        $this->setDefaults();
        $this_game = (array) $this->compose_the_game();
        return $this_game;
    }

    public function getAnswer() {
        return $this->the_answer;
    }

    public function genRandom() {
        return (rand($this->min_num, $this->max_num));
    }

    public function genOperation() {

        $the_operation = array_rand(self::$operationsList);
        return (string) self::$operationsList[$the_operation];
    }

    public function converseOperation(string $var) {

        switch ($var) {
            case 'CalcAdd':
                return (string) " + ";
            case 'CalcDiv':
                return (string) " / ";
            case 'CalcMul':
                return (string) " * ";
            case 'CalcSub':
                return (string) " - ";

            default:
                $msg = "Something bad happend at converse the operation $var";
                throw new Exception($msg);
        }
    }

    public function compose_the_game() {

        $calculator = new \App\Controllers\GameCalculator;

        // calculate the answer
        $set_op_str = (string) "\\App\\Controllers\\{$this->operation}";

        ///// This is the first number of equation so add it to null to prevent fails with multiplies

        $calculator->setOperation(new \App\Controllers\CalcAdd);
        $calculator->calculation($this->param_one);

        $calculator->setOperation(new $set_op_str);
        $calculator->calculation($this->param_two);

        $final_result = $calculator->getResult();

        if (self::$show_original_equation) {
            echo "{$this->param_one} {$this->converseOperation($this->operation)} {$this->param_two} = {$calculator->getResult()}";
        }

        $dataMatrix = array(
            "One" => $this->param_one,
            "Two" => $this->param_two,
            "Ope" => $this->operation,
            "Fin" => $final_result,
        );

        return $dataMatrix;
    }

    public function setDefaults() {

        $this->min_num = 1;
        $this->max_num = 20;

        $this->param_one = $this->genRandom();
        $this->param_two = $this->genRandom();

        $this->operation = $this->genOperation();

        return $this;
    }

    public function show_the_question() {

        return ($this->the_question);
    }
}
