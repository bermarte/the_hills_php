<?php
require './blackjack.php';
session_start();


if (!isset($_SESSION['counter_player'])){
    $_SESSION['counter_player'] = [];
}
if (!isset($_SESSION['counter_dealer'])){
    $_SESSION['counter_dealer'] = [];
}
if (!isset($_SESSION['game_end'])){
    $_SESSION['game_end'] = "0";
}

if (isset($_SESSION['player'])){
    $player = new Blackjack($_SESSION['player']->getScore());
} else {
    $player = new Blackjack(0);
}

if (isset($_SESSION['dealer'])){
    $dealer = new Blackjack($_SESSION['dealer']->getScore());
} else {
    $dealer = new Blackjack(0);
}

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


if(isset($_GET['hit'])) {
    $hit = $player->Hit();
    $_SESSION['player'] = $player;
    array_push($_SESSION['counter_player'], $hit);
    echo " your cards: ". implode(", ",$_SESSION['counter_player']);
}
if(isset($_GET['surrender'])) {
    echo($player->Surrender());
    unset($_SESSION['counter_player']);
    unset($_SESSION['counter_dealer']);
    $_SESSION['game_end']="1";
}


if(isset($_GET['stand'])) {
    if (!isset($_SESSION['player'])){
        echo 'you did not hit';
    }
    if (isset($_SESSION['player'])){
        echo "your score is: ".$_SESSION['player']->getScore()."<br>";
        echo " your cards: ". implode(", ",$_SESSION['counter_player'])."<br>";
        echo "player stands with ".$_SESSION['player']->getScore()."<br>";
        echo "<hr>dealer turn:<br>";

        do {
            $dealer_hit = $dealer->Hit();
            $_SESSION['dealer'] = $dealer;
            array_push($_SESSION['counter_dealer'], $dealer_hit);
            echo " your cards: ". implode(", ",$_SESSION['counter_dealer'])."<br>";
        }
        while(
            $_SESSION['dealer']->getScore() < 15
        );
        echo "<hr>";
        if ($_SESSION['dealer']->getScore() > 21){
            echo "player wins";
            $_SESSION['game_end'] = "1";

        }
        if ($_SESSION['player']->getScore() > $_SESSION['dealer']->getScore()){
            echo "player wins";
            $_SESSION['game_end'] = "1";

        }
        elseif ($_SESSION['player']->getScore() == $_SESSION['dealer']->getScore()){
            echo "tie";
            $_SESSION['game_end'] = "1";
        }

        else{
            echo "dealer wins";
            $_SESSION['game_end'] = "1";
        }
    }

}
if (isset($_GET['play_again']))
{
    unset($_SESSION['counter_player']);
    unset($_SESSION['counter_dealer']);
    unset($_SESSION['player']);
    unset($_SESSION['dealer']);
    unset($_SESSION['game_end']);
    header('Location: game.php');
}

if (isset($_SESSION['game_end'])){
    if ($_SESSION['game_end'] == "1"){
        echo '<br>GAME ENDS';
        echo "
            <form action='game.php' method='get'>
            <input type='submit' value='HIT' name='hit' disabled>
            <input type='submit' value='STAND' name='stand' disabled>
            <input type='submit' value='SURRENDER' name='surrender' disabled>
            <input type='submit' value='PLAY AGAIN' name='play_again'>
            </form>
         ";
    }
    else{
        echo "
            <form action='game.php' method='get'>
            <input type='submit' value='HIT' name='hit'>
            <input type='submit' value='STAND' name='stand'>
            <input type='submit' value='SURRENDER' name='surrender'>
            </form>
         ";
    }
}

//whatIsHappening();