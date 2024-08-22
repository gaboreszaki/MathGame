<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gameCalulatorTest
 *
 * @author mrgab
 */
class gameCalulatorTest extends PHPUnit\Framework\TestCase{


    public function testGameCalculatorAssertFailForRequestEmptyResults() {

        $this_instance = new App\Controllers\GameCalculator;

        $getRes = $this_instance->getResult();
        $this->assertEmpty($getRes);

    }


        public function testGameCalculatorToAdd() {

        $this_instance = new App\Controllers\GameCalculator;

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(2,2,2);
        $result = $this_instance->getResult();

        $this->assertEquals($result, 6);




    }
        public function testGameCalculatorToSubstruct() {

        $this_instance = new App\Controllers\GameCalculator;

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(10);

        $this_instance->setOperation(new App\Controllers\CalcSub);
        $this_instance->calculation(5);
        $result = $this_instance->getResult();

        $this->assertEquals($result, 5);

    }

        public function testGameCalculatorToDivine() {

        $this_instance = new App\Controllers\GameCalculator;

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(10);

        $this_instance->setOperation(new App\Controllers\CalcDiv);
        $this_instance->calculation(5);
        $result = $this_instance->getResult();

        $this->assertEquals($result, 2);

    }
        public function testGameCalculatorToMultiply() {

        $this_instance = new App\Controllers\GameCalculator;

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(10);

        $this_instance->setOperation(new App\Controllers\CalcMul);
        $this_instance->calculation(5);
        $result = $this_instance->getResult();

        $this->assertEquals($result, 50);

    }


        public function testGameCalculatorAllTogeather() {

        $this_instance = new App\Controllers\GameCalculator;

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(10);

        $this_instance->setOperation(new App\Controllers\CalcMul);
        $this_instance->calculation(5);

        $this_instance->setOperation(new App\Controllers\CalcAdd);
        $this_instance->calculation(10, 20);

        $this_instance->setOperation(new App\Controllers\CalcDiv);
        $this_instance->calculation(2);

        $this_instance->setOperation(new App\Controllers\CalcSub);
        $this_instance->calculation(20);

        $this_instance->setOperation(new App\Controllers\CalcMul);
        $this_instance->calculation(10, 10);

        $result = $this_instance->getResult();

        $this->assertEquals($result, 2000);

    }

}
