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
class gameControllerTest  extends \PHPUnit_Framework_TestCase{

    public function testGameControllerToSetupDefault() {

        $this_instance = new App\Controllers\GameController;

        $this_instance->setDefaults();

        $the_composed_game = $this_instance->compose_the_game();


        $this->assertArrayHasKey('One', $the_composed_game);
        $this->assertArrayHasKey('Two', $the_composed_game);
        $this->assertArrayHasKey('Ope', $the_composed_game);
        $this->assertArrayHasKey('Fin', $the_composed_game);



    }


public function testGameStartup(){

    $this_instance = new App\Controllers\GameController;

    $this_game =$this_instance->startGame();

    $this->assertClassHasStaticAttribute('operationsList', App\Controllers\GameController::class);

}

}
