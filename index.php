<?php
include_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\GameController;

ob_start();
session_start();

if (isset($_GET['set_game_difficulty'])) {
    $_SESSION['game_difficulty'] = $_GET['set_game_difficulty'];
} elseif (!isset($_SESSION['game_difficulty'])) {
    $_SESSION['game_difficulty'] = 'normal';
}


$game = new GameController();
$game->start();


?>
<!doctype html>
<html lang="en" data-bs-theme="auto">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Math Game 2.0</title>

    <script type="module" src="dist/main.js"></script>


</head>
<body>
<div class="container">
    <!-- Content here -->
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3 my-5 mb-3 text-center">

            <img src="dist/images/nws-math-game-logo.png" alt="Math Game" class="img img-fluid">


            <div class="col-12 mb-3 text-end mb-5">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/easy" class="btn btn-outline-<?php if ($_SESSION['game_difficulty'] == 'easy') {
                        echo 'primary';
                    } else {
                        echo 'secondary';
                    } ?>">Easy</a>
                    <a href="/normal" class="btn btn-outline-<?php if ($_SESSION['game_difficulty'] == 'normal') {
                        echo 'primary';
                    } else {
                        echo 'secondary';
                    } ?>">Normal</a>
                    <a href="/medium" class="btn btn-outline-<?php if ($_SESSION['game_difficulty'] == 'medium') {
                        echo 'primary';
                    } else {
                        echo 'secondary';
                    } ?>">Medium</a>
                    <a href="/hard" class="btn btn-outline-<?php if ($_SESSION['game_difficulty'] == 'hard') {
                        echo 'primary';
                    } else {
                        echo 'secondary';
                    } ?>">Hard</a>
                    <a href="/ultra_hard"
                       class="btn btn-outline-<?php if ($_SESSION['game_difficulty'] == 'ultra_hard') {
                           echo 'primary';
                       } else {
                           echo 'secondary';
                       } ?>">Ultra Hard</a>
                </div>
            </div>

            <div class="text-start">
                <h4>Objective:</h4>
                <p class="fs-5 mb-3">The game is simple, you need to find the <span class="text-primary">X</span> in the
                    equation.
                    <br><span class="text-primary">X</span> can be a <span class="text-success">number</span>, <span
                            class="text-success">result</span> or even the <span class="text-success">operation</span>
                    between two numbers.</p>
            </div>

            <div class="text-end">
                <p class="fs-4 text-primary mb-3">There is no score or prize... <br>Just you and a simple math
                    question...
                </p>
            </div>

            <div class="text-start">
                <p class="fs-5 mb-3">Can you solve it?
                    <br>Good Luck & Have Fun!</p>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3 py 3 text-center">
            <div class="alert alert-info" role="alert">


                <p class="fs-1">
                    <?php
                    echo "{$game->formated->getQuestion}";
                    ?>
                </p>
            </div>
            <hr>
            <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Show Solution
            </a>
            <div class="collapse" id="collapseExample">
                <div class="card mt-3">
                    <div class="card-body text-start">

                        <h3>The Correct answer is: <?php echo "{$game->formated->getAnswer}" ?></h3>
                        <p><?php echo "{$game->formated->getOriginalFormula}" ?></p>


                    </div>
                    <div class="card-footer text-end">
                        <a href="/" class="btn btn-success"> Play Again </a>
                        <!--                        <a href="#" onclick="location.reload()" class="btn btn-success"> Play Again </a>-->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>