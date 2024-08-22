<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gameAgeTest
 *
 * @author mrgab
 */
class gameAgeTest extends PHPUnit\Framework\TestCase {


    public function testAssertEmptyAge() {
        $this_instance = new App\Controllers\GameUserAge;

        $this->assertEmpty($this_instance->getUserAge());
    }

    public function testSetAgeAssertTrue() {

        $this_instance = new App\Controllers\GameUserAge;


        $this->assertTrue($this_instance->setUserAge(14));
        $this->assertEquals(14, $this_instance->getUserAge());


    }

        public function testSetAgeAssertFalse() {

        $this_instance = new App\Controllers\GameUserAge;

        $this->assertFalse($this_instance->setUserAge(-20));

        $this->assertFalse($this_instance->setUserAge(0));
        $this->assertFalse($this_instance->setUserAge(120));

        $this->assertFalse($this_instance->setUserAge(2.3));

    }
}
