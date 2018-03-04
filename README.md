# CalulatorGame
This project is only a playground for my PHPUnit and advanced techniques for PHP7.1

To run this app you need to run a ` composer dump-autoload `


### Current Features:

* start the game
    - get the questions
    - get the answer

#### Example:

```

$instance = new App\Controllers\GameController;

$new_game = $instance->startGame();
$the_question = $new_game->show_the_question();
$the_answer = $new_game->getAnswer()

```


### ToDo

* implement difficulty
* implement points
* implement users

* Frontend
