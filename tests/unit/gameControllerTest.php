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
class gameControllerTest extends PHPUnit\Framework\TestCase {

    public function testGameControllerParams() {

        $gameController = new App\Controllers\GameController();

        $this->assertObjectHasProperty('the_answer', $gameController);
        $this->assertObjectHasProperty('the_question', $gameController);
        $this->assertObjectHasProperty('param_two', $gameController);
        $this->assertObjectHasProperty('min_num', $gameController);
        $this->assertObjectHasProperty('max_num', $gameController);
        $this->assertObjectHasProperty('operation', $gameController);

        $this->assertObjectHasProperty('operationsList',$gameController);
        $this->assertObjectHasProperty('equationList', $gameController);
    }

    public function testGameSetupDataMatrix() {

        $this_instance = new App\Controllers\GameController;

        $this_game = $this_instance->setupGame();

        //// equalisation parts    a  +  b  =  c
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
