<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gameControllerTest
 *
 * @author mrgab
 */
class gameControllerTest extends \PHPUnit_Framework_TestCase {

    public function testGameControllerParams() {

        $this->assertClassHasAttribute('the_answer', App\Controllers\GameController::class);
        $this->assertClassHasAttribute('the_question', App\Controllers\GameController::class);
        $this->assertClassHasAttribute('param_two', App\Controllers\GameController::class);
        $this->assertClassHasAttribute('min_num', App\Controllers\GameController::class);
        $this->assertClassHasAttribute('max_num', App\Controllers\GameController::class);
        $this->assertClassHasAttribute('operation', App\Controllers\GameController::class);

        $this->assertClassHasStaticAttribute('operationsList', App\Controllers\GameController::class);
        $this->assertClassHasStaticAttribute('equationList', App\Controllers\GameController::class);
    }

    public function testGameSetupDataMatrix() {

        $this_instance = new App\Controllers\GameController;

        $this_game = $this_instance->setupGame();

        //// equalision parts    a  +  b  =  c
        /////                             1  2  3  4  5

        $this->assertArrayHasKey('One', $this_game);          /// 1 -> One
        $this->assertArrayHasKey('Two', $this_game);        /// 3 -> Two
        $this->assertArrayHasKey('Ope', $this_game);         /// 2 -> Ope
        $this->assertArrayHasKey('Fin', $this_game);        /// 5 -> Fin
    }

    public function testGameStart() {
        $this_instance = new App\Controllers\GameController;
        $this->assertTrue($this_instance->startGame());
    }
}
