# MathGame


## What is this project:
This is a small game for mostly practice TDD and advanced PHP 7 techniques.

The game can generate infinite amount of basic math question and the matching answer, with customisable difficulty.

**[Working demo](https://game.northweb.co.uk/)**

To run this app you need to run a ` composer dump-autoload `


### Current Features:

* 5 difficulty level
* 4 math operation support
* infinite amount of basic math question

### ToDo

- [x] implement difficulty
- [ ] implement points
- [ ] implement users
- [x] Frontend - Started
- [ ] Frontend - Finished

### Difficulties :

#### "easy":                        //default
- min_num = 1;
- max_num = 5;
- operations available: + -

#### "medium":
- min_num = 1;
- max_num = 10;
- operations available: * /

#### "hard":
- min_num = 10;
- max_num = 100;
- operations available: + - * /

#### "nerd":
- min_num = 100;
- max_num = 9999;
- operations available: + - * /

#### "ultra":
- min_num = 99999;
- max_num = 9999999;
- operations available: + - * /


#### Example:


```

    $new_game = new App\Controllers\GameController;

    $new_game->setGameDificulty("medium");      // optional - see difficulties
    $new_game->startGame();


    $the_question = $new_game->show_the_question();
    $the_answer = $new_game->getAnswer();

```
