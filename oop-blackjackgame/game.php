<?php
session_start();
$score_now = $_SESSION['score'];
//echo "session score ".$score_now;


require 'blackjack.php';

$player = new Blackjack;
$dealer = new Blackjack;

$_SESSION['player'] = $player;
$_SESSION['dealer'] = $dealer;
//var_dump($player);

if(isset($_GET['hit'])) {
    echo($player->Hit());
}
if(isset($_GET['surrender'])) {
    echo($player->Surrender());
}

?>
<form action='game.php' method='get'>
    <input type='submit' value='HIT' name='hit'>
    <input type='submit' value='STAND' name='stand'>
    <input type='submit' value='SURRENDER' name='surrender'>
</form>
