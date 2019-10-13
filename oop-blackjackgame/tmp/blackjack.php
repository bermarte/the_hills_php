<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

$score_now = $_SESSION['score'];



//classes
class Blackjack {
    public $score = 0;
    public $name ="player";
    const MIN = 1;
    const MAX = 11;
    const BJ_MAX= 21;
    public $cards = array();
    //add a card between 1-11
    public function Hit() : int
    {
        $hit = rand(self::MIN,self::MAX);
        $this->score = $hit;
        $_SESSION['score'] +=  $hit;



        if ($_SESSION['score']>self::BJ_MAX){
            //echo '<br>you loose<br>';
            die('you score is '.$_SESSION['score']." you loose");
            //$this->Surrender();

        }
        else{
            echo 'your card: ';
        }
        echo 'total: '.$_SESSION['score']."<br>";
        /*
        foreach($this->cards as $item):
            echo '<span>element: '.$item.',</span>';

        endforeach;
        */
        //print_r($this->cards);
        $this->makeArray($hit);
        echo "<br>";

        return $hit;
    }

    public function makeArray($val){
        $this->cards = [];
        array_push($this->cards, $val);
        //echo (string)$this->cards;
        //var_dump($array);
    }


    public function Stand() : string
    {

        return 'Stand';
    }

    public function Surrender() : string
    {
        unset($_SESSION['player']);
        unset($_SESSION['dealer']);
        $_SESSION['score'] = 0;
        return 'you loose';
    }
}

//var_dump($player);

