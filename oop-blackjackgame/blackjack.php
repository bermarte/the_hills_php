<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);


//classes
class Blackjack {
    private $score = 0;
    const MIN = 1;
    const MAX = 11;
    const BJ_MAX= 21;


    public function __construct(int $score)
    {
        $this->score = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function Hit() : int
    {
        $hit = rand(self::MIN,self::MAX);
        $this->score += $hit;

        echo 'your score is: '.$this->score;


        if ($this->score > self::BJ_MAX){
            echo(" - you loose<br>");
            $_SESSION['game_end'] = "1";
        }
        elseif ($this->score == self::BJ_MAX){
            echo(" - you win<br>");
            $_SESSION['game_end'] = "1";
        }

        else{
            echo("<br>");
        }

        return $hit;
    }

    public function Stand() : int
    {

    }

    public function Surrender() : string
    {
        unset($_SESSION['player']);
        unset($_SESSION['dealer']);
        setcookie('PHPSESSID', "", 1);
        $_SESSION['game_end'] = "1";
        return 'you have surrendered, you loose';
    }
}

