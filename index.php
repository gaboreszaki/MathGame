<?php
include_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\GameController;

ob_start();
session_start();

if (!isset($_SESSION['show_disclaimer'])) {
    $_SESSION['show_disclaimer'] = true;
}else{
    $_SESSION['show_disclaimer'] = false;
}

if (isset($_GET['set_game_difficulty'])) {
    $_SESSION['game_difficulty'] = $_GET['set_game_difficulty'];
} elseif (!isset($_SESSION['game_difficulty'])) {
    $_SESSION['game_difficulty'] = 'normal';
}


$game = new GameController();
$game->start();

$parsedown = new Parsedown();
$file = file_get_contents('./policies/cookie_and_privacy_policies.md', true);



?>
<!doctype html>
<html lang="en" data-bs-theme="auto">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Math Game 2.0 BETA</title>

    <script type="module" src="dist/main.js"></script>


</head>
<body class="svg-bg prism-1">
<div class="container">
    <!-- Content here -->
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3 my-5 mb-3 text-center">

            <?php if ($_SESSION['show_disclaimer']) {?>
            <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                <strong>Disclaimer:</strong> <br> This mini-game is currently under development and is provided in its
                present, usable state. Please be aware that the game may contain bugs, incomplete features, or other
                issues as it is still being refined. Your feedback is valuable and will help improve the final version.
                By using this game, you acknowledge that it is not the finished product and that any issues encountered
                are part of the ongoing development process.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }?>

            <img src="dist/images/nws-math-game-logo.png" alt="Math Game" class="img img-fluid">


            <div class="col-12 mb-3 text-end mb-5">
                <div class="btn-group shadow shadow-sm" role="group" aria-label="Game Difficulty Control">
                    <a href="/easy" class="btn btn-<?php if ($_SESSION['game_difficulty'] == 'easy') {
                        echo 'primary';
                    } else {
                        echo 'light';
                    } ?>">Easy</a>
                    <a href="/normal" class="btn btn-<?php if ($_SESSION['game_difficulty'] == 'normal') {
                        echo 'primary';
                    } else {
                        echo 'light';
                    } ?>">Normal</a>
                    <a href="/medium" class="btn btn-<?php if ($_SESSION['game_difficulty'] == 'medium') {
                        echo 'primary';
                    } else {
                        echo 'light';
                    } ?>">Medium</a>
                    <a href="/hard" class="btn btn-<?php if ($_SESSION['game_difficulty'] == 'hard') {
                        echo 'primary';
                    } else {
                        echo 'light';
                    } ?>">Hard</a>
                    <a href="/ultra_hard"
                       class="btn btn-<?php if ($_SESSION['game_difficulty'] == 'ultra_hard') {
                           echo 'primary';
                       } else {
                           echo 'light';
                       } ?>">Ultra Hard</a>
                </div>
            </div>
            <div class="card transparent-white shadow shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Math Game</h5>
                    <div class="text-start">
                        <h4>Objective:</h4>
                        <p class="fs-5 mb-3">The game is simple, you need to find the <span
                                    class="text-primary">X</span> in the
                            equation.
                            <br><span class="text-primary">X</span> can be a <span class="text-success">number</span>,
                            <span
                                    class="text-success">result</span> or even the <span
                                    class="text-success">operation</span>
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


        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3  text-center">
            <div class="alert alert-question shadow shadow-sm" role="alert">

                <h6>The question is:</h6>

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
                <div class="card transparent-white mt-3 mb-5 shadow shadow-sm">
                    <div class="card-body text-center">

                        <h3>The Correct answer is: <br><span
                                    class="text-primary"> <?php echo "{$game->formated->getAnswer}" ?> </span></h3>
                        <p class="fs-6">( <?php echo "{$game->formated->getOriginalFormula}" ?> )</p>

                        <a href="/" class="btn btn-success mt-3 mb-2"> Play Again </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-3 text-center mt-5 mb-3">

            <h5>All rights reserved &copy; 2024 Gabor Eszaki</h5>

            <div class="btn-group">


            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cookie and Privacy Policy
            </button>
            <a href="https://github.com/gaboreszaki/MathGame" class="btn btn-link" target="_blank">GitHub</a>
            </div>
        </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cookie and Privacy Policy</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                echo $parsedown->text($file);
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>



