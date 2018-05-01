# CalulatorGame

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/119da431f9af43c2b6ba9740d6f8756f)](https://app.codacy.com/app/gaboreszaki/CalulatorGame?utm_source=github.com&utm_medium=referral&utm_content=gaboreszaki/CalulatorGame&utm_campaign=badger)

This project is only a playground for my PHPUnit and advanced techniques for PHP7.1

**working demo: https://game.northweb.co.uk/**

To run this app you need to run a ` composer dump-autoload `


### Current Features:

* available difficulties
    - easy [min 1]
    - medium
    - hard
    - nerd
    - ultra

* start the game
    - get the questions
    - get the answer


### ToDo

- [x] implement difficulty
- [ ] implement points
- [ ] implement users
- [x] Frontend - Started
- [ ] Frontend - Finished


#### Example:

```

$instance = new App\Controllers\GameController;

$new_game = $instance->startGame();
$the_question = $new_game->show_the_question();
$the_answer = $new_game->getAnswer();

```

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
