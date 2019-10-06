<?php
include('assets/php/main.php');
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>pokedex</title>
			<!-- link to main stylesheet -->
			<!-- project built on https://github.com/bloodstorms/pokedex -->

			<link rel="stylesheet" type="text/css" href="assets/css/main.css">
			<link rel="icon" sizes="144x144" href="assets/img/pokedex/pokeball.png">
		</head>
		<body>
		  <div id="pokedex">
		    <div id="left">
                <form method="post" target="_self">
		      <div id="top-left"></div>
		      <div id="top-left1">
		        <div id="glass-button">
		          <div id="reflect"></div>
		        </div>
		        <div id="top-buttons">
		          <div id="top-button-red"></div>
		          <div id="top-button-yellow"></div>
		          <div id="top-button-green"></div>
		        </div>
		      </div>
		      <div id="top-left2"></div>
		      <div id="logo"><img src="assets/img/pokedex/logo-pokemon.png" alt="logo pokedex"/>
		      </div>
		      <div id="border-screen">
		        <div id="button-top1"></div>
		        <div id="button-top2"></div>
		        <!-- <div id="button-bottom" onclick="ShinyPicture()" title="shiny pokemon"></div> -->
                <!-- shiny picture -->
                <input type="submit" name="shiny" id="button-bottom" onclick="" title="shiny pokemon" value="">
		        <p class="selectDisable">&equiv;&equiv;</p>
		      </div>

              <!-- monitor-->
		      <div id="screen"><img class="selectDisable" id="screen_image" src="<?php get_image(0);?>" alt=""/>
              <input type="hidden" name="imageValue" id="imageValueId" value="" onsubmit="">
                <!-- value="javascript: document.getElementsByName('screen_image')[0].src;" -->
              </div>
		      <div id="triangle"></div>
              <!-- <div id="blue-button-left" title="search pokemon by name"></div> -->
		      <input type="submit" id="blue-button-left" title="search pokemon by name" name="search_by_name" value="">
              <!-- <div id="green-button-left" onclick="PicturePokemon()" title="front pokemon"></div> -->
		      <input type="submit"  id="green-button-left" name="front_img" onclick="" title="front pokemon" value="">
		      <!--<div id="orange-button-left" onclick="retroPicturePokemon()" title="background pokemon"></div>-->
              <input type="submit" id="orange-button-left" name="back_img" onclick="" title="background pokemon" value="">
              <input type="hidden" name="imageValueBack" id="imageValueIdBack" value="" onsubmit="">
		      <div id="square-button-left">

		        <input id="nb" type="text" name="howmuch" value="<?php number_of_pokemon(0);?>" oninput="this.form.submit(); return false;" title="search pokemon by ID">
				  <input id="searchByNameDiv" type="text" name="searchByNameDiv" value="<?php name_of_pokemon($pokemonList[$_POST['howmuch']-1]);?>" title="write name of pokemon">
                  <!-- hidden input to copy the name of the pokemon-->
                  <input type="hidden" name="name_of_pokemon" id="name_of_pokemon" value="" onsubmit="">
                      <!--<input type="submit" value="Submit">-->

		      </div>

		      <div id="cross">
		        <div id="mid-cross">
		          <div id="mid-circle"></div>
		        </div>
                  <!-- increase pokemon increaseIdPokemon() -->

		        <input type= "submit" id="top-cross" name="next" onclick="<?php number_of_pokemon(1);?>" title="next pokemon" value="">
                  <div id="upC"></div>

                 <input type= "submit" id="right-cross" name="next" onclick="<?php number_of_pokemon(1);?>" title="next pokemon" value="">
                  <div id="rightC"></div>


                   <input type= "submit" id="bot-cross" name="previous" onclick="this.form.submit();" title="previous pokemon" value="">

                   <div id="downC"></div>

                 <input type= "submit" id="left-cross" name="previous" onclick="this.form.submit();" title="previous pokemon" value="">
                   <div id="leftC"></div>


               </div>

             </div>
               <div id="middle">
                 <div id="hinge1"></div>
                 <div id="hinge2"></div>
                 <div id="hinge3"></div>
               </div>
             <div id="right">
               <!--<div id="info-screen">-->
                <?php

                 echo "<div id='info-screen'> </div>";
                 ?>

		      <div id="keyboard">
                  <!--
                  <div class="key" id="blue1" data-move="0" title="show move #1"></div>
                  <div class="key" id="blue2" data-move="1" title="show move #2"></div>
                  <div class="key" id="blue3" data-move="2" title="show move #3"></div>
                  <div class="key" id="blue4" data-move="3" title="show move #4"></div>
                  <div class="key" id="blue5" data-move="4" title="show move #5"></div>
                  <div class="key" id="blue6" data-move="5" title="show move #6"></div>
                  <div class="key" id="blue7" data-move="6" title="show move #7"></div>
                  <div class="key" id="blue8" data-move="7" title="show move #8"></div>
                  <div class="key" id="blue9" data-move="8" title="show move #9"></div>
                  <div class="key" id="blue10" data-move="9" title="show move #10"></div>
                  -->
                  <!-- moves -->
                  <input type="submit" name="move" class="key" id="blue1" data-move="0" title="show move #1" value="0">
                  <input type="submit" name="move" class="key" id="blue2" data-move="1" title="show move #2" value="1">
                  <input type="submit" name="move" class="key" id="blue3" data-move="2" title="show move #3" value="2">
                  <input type="submit" name="move" class="key" id="blue4" data-move="3" title="show move #4" value="3">
                  <input type="submit" name="move" class="key" id="blue5" data-move="4" title="show move #5" value="4">
                  <input type="submit" name="move" class="key" id="blue6" data-move="5" title="show move #6" value="5">
                  <input type="submit" name="move" class="key" id="blue7" data-move="6" title="show move #7" value="6">
                  <input type="submit" name="move" class="key" id="blue8" data-move="7" title="show move #8" value="7">
                  <input type="submit" name="move" class="key" id="blue9" data-move="8" title="show move #9" value="8">
                  <input type="submit" name="move" class="key" id="blue10" data-move="9" title="show move #10" value="9">
		      </div>
		      <input type="submit" name="song1" id="leaf-button-right" title="play song #1" value="">
              <!--<div id="leaf-button-right" title="play song #1"></div>-->
		      <input type="submit" name="song2" id="yellow-button-right"  title="play song #2" value="">
              <!-- <div id="yellow-button-right"  title="play song #2"></div> -->
		      <input type="submit" name ="height" id="green-button-right" title="show height" value="">
              <!-- <div id="green-button-right" title="show height"></div> -->
		      <input type="submit" name="weight" id="orange-button-right" title="show weight" value="">
              <!-- <div id="orange-button-right" title="show weight"></div> -->
		      <input type="submit" name="previousImg" id="left-cross-button" title="show previous evolution" value="">
              <!--  <div id="left-cross-button" title="show previous evolution">-->
		        <div id="leftT"></div>

              <input type="submit" name="nextImg" id="right-cross-button"  title="show next evolution" value="">
		      <!--<div id="right-cross-button"  title="show next evolution">-->
		        <div id="rightT"></div>

		      <!-- <div id="cross-button" title="show ID">-->
              <input type="submit" name="get_id" id="cross-button" title="show ID" value="">
		        <div id="left-red-cross"></div>

		      <div id="square-button-right1"></div>
		      <div id="square-button-right2"></div>

		      <div id="top-right1"></div>
		      <div id="top-right2"></div>
		  </div>
          </form>
          <script>
              //blue-button-left linea 48 button
              //linea 57
              //<input type="submit" id="blue-button-left" title="search pokemon by name" name="search_by_name" value="ABC" onclick="getText(val);">
              //<input type="hidden" name="name_of_pokemon" id="name_of_pokemon" value="" onsubmit="">
              //searchByNameDiv
              // <input type="submit" id="blue-button-left" title="search pokemon by name" name="search_by_name" value="_">
              //search by name
              searchByNameDiv = document.getElementById("searchByNameDiv");
              document.getElementById("blue-button-left").addEventListener("click", searchByName);
              function searchByName() {

                  if (searchByNameDiv.value !== "name of pokemon" && searchByNameDiv.value !== "") {
                      name = searchByNameDiv.value;
                      console.log('search by name', name);
                      document.getElementById('blue-button-left').value = name;

                      console.log('search by name', name_input);
                      //$_POST['search_by_name']


                  }

              }


              <?php
                      echo '
              //front image
              let img =  document.getElementById(\'screen_image\').getAttribute(\'src\');
              document.getElementById(\'imageValueId\').value = img;

              //copy the name of the pokemon to the monitor on the right as well
              let poke_name = document.getElementById(\'searchByNameDiv\').getAttribute(\'value\');
              console.log("poke_name", poke_name);
              document.getElementById(\'name_of_pokemon\').value = poke_name;
              document.getElementById("info-screen").innerHTML = document.getElementById("name_of_pokemon").value;


              //back image not implemented
              let imgBack =  document.getElementById(\'screen_image\').getAttribute(\'src\');
              document.getElementById(\'imageValueIdBack\').value = imgBack;
              console.log(document.getElementById(\'imageValueIdBack\').value);
              ';
              ?>
              <?php
               //show id
               if (isset($_POST['get_id'])){
                   echo 'document.getElementById("info-screen").innerHTML = "ID:'.$_POST['howmuch'].'"';

                }
              //show moves
              if (isset($_POST['move'])){
                  move($_POST['howmuch'],$move, $_POST['move']);
              }
              function move($poke, $move, $post){
                  $url = "https://pokeapi.co/api/v2/pokemon/".$poke;
                  $json = file_get_contents($url);
                  $obj = json_decode($json);
                  $move = $obj->moves[$post]->move->name;

                  if (empty($move)){
                      $move = "no moves found :(";
                      echo 'document.getElementById("info-screen").innerHTML = "'.$move.'";';
                  }
                  else{
                    echo 'document.getElementById("info-screen").innerHTML = "'.$move.'";';
                  }
              }
              //show height
              if (isset($_POST['height'])){
                  height($_POST['howmuch'],$height, $_POST['move']);
              }
              function height($poke, $height, $post){
                  $url = "https://pokeapi.co/api/v2/pokemon/".$poke;
                  $json = file_get_contents($url);
                  $obj = json_decode($json);
                  $height = $obj->height;
                  echo 'document.getElementById("info-screen").innerHTML = "height: '.$height.' ft"';
              }
              //show weight
              if (isset($_POST['weight'])){
                  weight($_POST['howmuch'],$weight, $_POST['move']);
              }
              function weight($poke, $weight, $post){
                  $url = "https://pokeapi.co/api/v2/pokemon/".$poke;
                  $json = file_get_contents($url);
                  $obj = json_decode($json);
                  $weight = $obj->weight;
                  echo 'document.getElementById("info-screen").innerHTML = "weight: '.$weight.' lb"';
              }


              //search by name
              if (isset($_POST['search_by_name'])){

                  echo 'document.getElementById("searchByNameDiv").value ="'.$_POST['search_by_name'].'";';

                  if (empty($_POST['search_by_name'])){
                      echo 'document.getElementById("info-screen").innerHTML = "write a name";';
                  }
                  else{
                      $pokeurl = "https://pokeapi.co/api/v2/pokemon/";
                      $url = "https://pokeapi.co/api/v2/pokemon/".$_POST['search_by_name'];
                      $json = file_get_contents($url);

                      //convert to assoc array to check if fetch is empty
                      if (count(json_decode($json,1))==0){
                          $msg = 'did not find anything';
                          echo 'document.getElementById("info-screen").innerHTML = "'.$msg.'";';
                      }
                      else{
                          $obj = json_decode($json);
                          echo 'document.getElementById("nb").value = "'.$obj->id.'";';
                          $img = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$obj->id.".png";
                          echo 'document.getElementById("screen_image").src = "'.$img.'";';
                          echo 'document.getElementById("info-screen").innerHTML = "'.$_POST['search_by_name'].'";';
                      }

                  }
              }




              //evolve previous
              function evolvesFrom($poke){
                  //evolveData port from JS
                  $url = "https://pokeapi.co/api/v2/pokemon-species/".$poke;
                  $json = file_get_contents($url);
                  $obj = json_decode($json);
                  $evolveData = $obj->evolves_from_species->name;

                  $url_spec = "https://pokeapi.co/api/v2/pokemon/".$evolveData;
                  $json_spec = file_get_contents($url_spec);
                  $obj_spec = json_decode($json_spec);
                  $sprite = $obj_spec->sprites->front_default;
                  $id = $obj_spec->id;

                  $oldid = $id;

                  if (!empty($sprite)){
                    $imgdiv = "<a href='javascript:;' onclick='evolveToScreen(" . $id . ")'><img src='" . $sprite ."' alt='pokemon evolve from'></a>";

                  }
                  else{
                      $imgdiv= "no evolution";
                  }
                  echo 'document.getElementById("info-screen").innerHTML = "previous: '.$imgdiv.' "';

              }

              if (isset($_POST['previousImg'])){
                  evolvesFrom($_POST['howmuch']);

                  //$url_id = "https://pokeapi.co/api/v2/pokemon/".$poke;
                  $url_id = "https://pokeapi.co/api/v2/pokemon/".$_POST['howmuch'];
                  $json_id = file_get_contents($url_id);
                  $obj_id = json_decode($json_id);
                  $my_id = $obj_id->id;




              //previous evolution to the left screen and upload the data
                      echo '
              function evolveToScreen(val){
                  document.getElementById("screen").getElementsByTagName("img")[0].src = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" + val + ".png";
                  //force changing id in field number
                  //document.getElementById("nb").value = "'.$my_id.'";
                  document.getElementById("nb").value = val;
                  //$pokemonList $pokemonList[1]
                  document.getElementById("searchByNameDiv").value = "'.$pokemonList[(int)$_POST['howmuch']-2].'";
                  
               
                  
              }';

              }

              //evolve to
              if (isset($_POST['nextImg'])){
                  $next = "NEXT";
                  echo 'document.getElementById("info-screen").innerHTML = "next: '.$next.' "';
              }



              ?>


          </script>
		  <!--<script src="assets/js/pokedex.js"></script>-->
          <?php
          include('assets/php/script.php');
          ?>
		</body>
	</html>
