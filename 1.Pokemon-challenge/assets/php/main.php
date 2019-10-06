<?php
session_set_cookie_params(0);
session_start();

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting( error_reporting() & ~E_NOTICE );


$url = "https://pokeapi.co/api/v2/pokemon/?offset=0&limit=964";
$pokemonList = array();

$json = file_get_contents($url);
$obj = json_decode($json);

//first fetch json
if(! is_array($obj)) {
    foreach($obj as $values)
    {
        foreach($values as $key => $value){
            array_push( $pokemonList, $values[$key]->name);

        }
    }

} else {
    echo "no data";
}

//show name of pokemon
function name_of_pokemon( $val){
    if(! isset($_POST['howmuch'] ) || empty($_POST['howmuch'])|| $_POST['howmuch']==="1"){
        echo "bulbasaur";
    }
    else{

        echo $val;

        //showNameRight($val);
    }

}

//next pokemon
if (isset($_POST['next'] )){
    if ($_POST['howmuch']==count($pokemonList)-1){
        $_POST['howmuch'] = 1;
    }
    else{
        $_POST['howmuch']+= 1;
    }
}
//previous pokemon
if (isset($_POST['previous'] )){
    if ($_POST['howmuch']==="1"){
        $_POST['howmuch'] = count($pokemonList)-1;
    }
    else{
        $_POST['howmuch']-= 1;
    }
}
//echo "document.getElementById('info-screen').innerHTML = 'not a number'";
//get id of pokemon
function number_of_pokemon($val){

    if(! isset($_POST['howmuch'] ) || empty($_POST['howmuch'])){
        echo 1;
    }
    else{
        if (is_numeric($_POST['howmuch'])){
            echo $_POST['howmuch'];
            //change also the name on the monitor on the right

        }
        else{
            //if is not a number return 1
            echo 1;
        }
    }
}
function checkShiny($state){
    if ($state === 1)
    {
        $state = 0;
    }
    else
    {
        $state = 1;
    }

}


//show image
 function get_image( $back){

     if(! isset($_POST['howmuch'] ) || empty($_POST['howmuch'])|| $_POST['howmuch']==="1"){
         //first time we have bulbasaur

         if (isset($_POST['back_img'])){
             echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/1.png";
         }
         elseif (isset($_POST['shiny'])){
             //check if shiny is visible
             $src_img = '';
             if (isset($_POST['imageValue'])){
                 $src_img = $_POST['imageValue'];

             }
             if( strpos( $src_img, 'shiny' )){
                if (strpos( $src_img, 'back' )){
                    echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/1.png";
                }else{
                    echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";
                }

             }
             else{
                echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/1.png";
             }
         }

         else{
            echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";
         }
     }

     else{
         if (isset($_POST['back_img'])){

             echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/".$_POST['howmuch'].".png";
         }

         elseif (isset($_POST['shiny'])){

            echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/".$_POST['howmuch'].".png";
             //echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/".$_POST['howmuch'].".png";
         }

         else{
            echo "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$_POST['howmuch'].".png";
         }
     }

 }

//song1
/*
 * var audio1 = new Audio('assets/audio/professor oak.mp3');
 if (audio1.paused) {
        audio1.play()
    } else audio1.pause();
}
 */

//show back image

/*
if (isset($_POST['back_img'] )){
    get_image(true);
    //imgToLoad = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/" + (idPokemon + 1) + ".png";
}
*/
//https://stackoverflow.com/questions/24394059/inside-if-condition-toggle-a-var-to-true-false-true-false 1
//song 1
if (isset($_POST['song1'])){
    if($_SESSION['play']) {
        echo "<embed src =\"assets/audio/professor oak.mp3\" hidden=\"true\" autostart=\"true\"></embed>";
        $_SESSION['play'] = false;
        $_SESSION['play2'] = true;
    } else {
        //echo "";
        $_SESSION['play'] = true;
        $_SESSION['play2'] = true;
    }
}

//song 2
if (isset($_POST['song2'])){
    if($_SESSION['play2']) {
        echo "<embed src =\"assets/audio/ending.mp3\" hidden=\"true\" autostart=\"true\"></embed>";
        $_SESSION['play2'] = false;
        $_SESSION['play'] = true;
    } else {
        //echo "";
        $_SESSION['play2'] = true;
        $_SESSION['play'] = true;
    }
}
