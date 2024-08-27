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
class gameDificultyTest extends PHPUnit\Framework\TestCase {



    public function testDifArray() {

        //// i want to get back an array
        $this_instance = new \App\Controllers\OldGameControllers\GameController;
        $difficulty = $this_instance->availableDificultyLevels;

        $this->assertCount(5, $difficulty);
        $this->assertContainsOnly( 'string', $difficulty);



    }



        /** @depends testDifArray */
        public function testGameCanSetDificulty() {

        $this_instance = new \App\Controllers\OldGameControllers\GameController;

        //// TRUE tests
        $this->assertTrue($this_instance->setGameDificulty('easy'));
        $this->assertEquals($this_instance->getGameDificulty(), 'easy');

        $this->assertTrue($this_instance->setGameDificulty('medium'));
        $this->assertEquals($this_instance->getGameDificulty(), 'medium');

        $this->assertTrue($this_instance->setGameDificulty('hard'));
        $this->assertEquals($this_instance->getGameDificulty(), 'hard');

        $this->assertTrue($this_instance->setGameDificulty('nerd'));
        $this->assertEquals($this_instance->getGameDificulty(), 'nerd');

        $this->assertTrue($this_instance->setGameDificulty('ultra'));
        $this->assertEquals($this_instance->getGameDificulty(), 'ultra');


        ///// FAIL TESTS
        $this->assertFalse($this_instance->setGameDificulty('sadasda'));
        $this->assertFalse($this_instance->setGameDificulty('sada saaaasda'));
        $this->assertFalse($this_instance->setGameDificulty('ULTRA'));



    }





}
