<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gameDificultyTest
 *
 * @author mrgab
 */
class gameDificultyTest extends \PHPUnit_Framework_TestCase {



    public function testDifArray() {

        //// i want to get back an array
        $this_instance = new App\Controllers\GameDificulty;
        $dif_array = $this_instance->getGameAvailableDificulty();

        $this->assertCount(4, $dif_array);
        $this->assertContainsOnly( "string", $dif_array);



    }



        /** @depends testDifArray */
        public function testGameCanSetDificulty() {

        $this_instance = new App\Controllers\GameDificulty;

        //// TRUE tests
        $this->assertTrue($this_instance->setGameDificulty('easy'));
        $this->assertEquals($this_instance->getGameDificulty(), 'easy');

        $this->assertTrue($this_instance->setGameDificulty('medium'));
        $this->assertEquals($this_instance->getGameDificulty(), 'medium');

        $this->assertTrue($this_instance->setGameDificulty('hard'));
        $this->assertEquals($this_instance->getGameDificulty(), 'hard');

        $this->assertTrue($this_instance->setGameDificulty('nerd'));
        $this->assertEquals($this_instance->getGameDificulty(), 'nerd');


        ///// FAIL TESTS
        $this->assertFalse($this_instance->setGameDificulty('sadasda'));
        $this->assertFalse($this_instance->setGameDificulty('sada saaaasda'));



    }





}
