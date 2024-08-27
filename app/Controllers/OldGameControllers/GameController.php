<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers\OldGameControllers;

use App\Controllers\OldGameControllers;
use App\Controllers\Operators;
use Exception;

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
    private $this_game_difficulty;
    public $availableDificultyLevels = array("easy", "medium", "hard", "nerd", "ultra");
    public static $operationsList = array("CalcAdd", "CalcSub", "CalcDiv", "CalcMul");
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


        ///make answer to human visible
        if (in_array($this_game["$selected_part"], self::$operationsList)) {
            $str = $this_game["$selected_part"];
            $this->the_answer = trim($this->converseOperation($str));
        } else {
            $this->the_answer = $this_game["$selected_part"];
        }


        //print_r($this->the_answer);
        $the_other_parts = $this_game;

        $the_other_parts["$selected_part"] = "<span class=\"text-primary\">x</span>";
        $this->the_question = $the_other_parts;



        return TRUE;
    }

    public function setGameDificulty(string $newDif) {

        $clear_dif = trim($newDif);

        if (in_array($clear_dif, $this->availableDificultyLevels)) {
            $this->this_game_difficulty = $clear_dif;
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getGameDificulty() {
        return $this->this_game_difficulty;
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






        switch ($this->this_game_difficulty) {
            case "easy":
                $min = 0;
                $max = 1;
                break;
            case "medium":
                $min = 2;
                $max = 3;
                break;
            default:
                $min = 0;
                $max = 3;
                break;

        }

            $my_rand_operation_pick = rand($min, $max);
            return (string) self::$operationsList[$my_rand_operation_pick];





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

        $calculator = new OldGameControllers\GameCalculator;

        // calculate the answer
        $set_op_str = (string) "\\App\\Controllers\\{$this->operation}";

        ///// This is the first number of equation so add it to null to prevent fails with multiplies

        $calculator->setOperation(new Operators\CalcAdd);
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





        switch ($this->this_game_difficulty) {
            case "medium":
                $this->min_num = 1;
                $this->max_num = 10;
                $this->param_one = $this->genRandom();
                $this->param_two = $this->genRandom();

                $this->operation = $this->genOperation();

                return $this;

            case "hard":
                $this->min_num = 10;
                $this->max_num = 100;
                $this->param_one = $this->genRandom();
                $this->param_two = $this->genRandom();

                $this->operation = $this->genOperation();

                return $this;
            case "nerd":
                $this->min_num = 100;
                $this->max_num = 9999;
                $this->param_one = $this->genRandom();
                $this->param_two = $this->genRandom();

                $this->operation = $this->genOperation();

                return $this;

            case "ultra":
                $this->min_num = 99999;
                $this->max_num = 9999999;
                $this->param_one = $this->genRandom();
                $this->param_two = $this->genRandom();

                $this->operation = $this->genOperation();

                return $this;


            default:
                $this->min_num = 1;
                $this->max_num = 5;
                $this->param_one = $this->genRandom();
                $this->param_two = $this->genRandom();

                $this->operation = $this->genOperation();

                return $this;
        }
    }

    public function show_the_question() {

        return ($this->the_question);
    }
}
