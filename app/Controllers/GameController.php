<?php

namespace App\Controllers;


use App\Controllers\Operators\{CalcAdd, CalcDiv, CalcMul, CalcSub};

class GameController
{


    public object $difficulty;
    private object $formula;
    private string $selectedForX;
    public object $formated;

    public function __construct()
    {

        $difficulty_level = $_SESSION['game_difficulty'];

        switch ($difficulty_level) {
            case 'easy':
                $operators = ['add', 'sub'];
                $min_number = 10;
                $max_number = 99;
                $selectable_for_x = ['result'];
                break;
            case 'medium':
                $operators = ['add', 'sub', 'mul', 'div'];
                $min_number = 100;
                $max_number = 9999;
                $selectable_for_x   = ['result'];
                break;
            case 'hard':
                $operators = ['add', 'sub', 'mul'];
                $min_number = 1000;
                $max_number = 9999;
                $selectable_for_x = ['component_a', 'component_b', 'result'];
                break;

            case 'ultra_hard':
                $operators = ['add', 'sub', 'mul', 'div'];
                $min_number = 1000;
                $max_number = 999999;
                $selectable_for_x = ['component_a', 'component_b', 'operator', 'result'];
                break;


            default: /// normal
                $operators = ['add', 'sub'];
                $min_number = 100;
                $max_number = 10000;
                $selectable_for_x = ['component_a', 'component_b',  'result'];
                break;
        }

        $this->difficulty = (object)["operators" => $operators, "min_number" => $min_number, "max_number" => $max_number];
        $this->selectedForX = array_rand(array_flip($selectable_for_x), 1);


    }

    public function start()
    {
        if ($this->setupFormula()) {
            $this->setupFormated();
        };

    }

    public function setupFormula(): bool
    {

        /// A + B = C
        /// $component_a $component_b $operator = $result

        /// Static:
        $component_a = (object)["value" => rand($this->difficulty->min_number, $this->difficulty->max_number), "is_replaced" => $this->isSelected('component_a')];
        $component_b = (object)["value" => rand($this->difficulty->min_number, $this->difficulty->max_number), "is_replaced" => $this->isSelected('component_b')];
        $operator = (object)["value" => $this->difficulty->operators[array_rand($this->difficulty->operators)], "is_replaced" => $this->isSelected('operator')];


        switch ($operator->value) {
            case 'add':
                $mathClass = new CalcAdd;
                $displayed = "+";
                break;
            case 'sub':
                $mathClass = new CalcSub;
                $displayed = "-";
                break;
            case 'mul':
                $mathClass = new CalcMul;
                $displayed = "*";
                break;

            case 'div':
                $mathClass = new CalcDiv;
                $displayed = "/";
                break;
        }
        $operator = (object)["value" => $displayed, "is_replaced" => $this->isSelected('operator')];
        $result = (object)['value' => $mathClass->run($component_b->value, $component_a->value), "is_replaced" => $this->isSelected('result'),];


        $this->formula = (object)compact('component_a', 'component_b', 'operator', 'result');

        return true;


    }

    public function setupFormated()
    {

        $formula = $this->formula;


        $part_a = $formula->component_a->is_replaced ? '<span class="text-primary">X</span>' : $this->formula->component_a->value;
        $part_operator = $formula->operator->is_replaced ? '<span class="text-primary">X</span>' : $this->formula->operator->value;
        $part_b = $formula->component_b->is_replaced ? '<span class="text-primary">X</span>' : $this->formula->component_b->value;
        $part_result = $formula->result->is_replaced ? '<span class="text-primary">X</span>' : $this->formula->result->value;

        $getQuestion = "$part_a $part_operator $part_b = $part_result";
        $item = "$this->selectedForX";
        $getAnswer = $this->formula->$item->value;

        $getOriginalFormula = $this->formula->component_a->value . ' ' . $this->formula->operator->value . ' ' . $this->formula->component_b->value . ' = ' . $this->formula->result->value;


        $this->formated = (object)compact('getQuestion', 'getAnswer', 'getOriginalFormula');

    }

    public function isSelected($searchedPart): bool
    {
        return $this->selectedForX == $searchedPart;
    }


}

