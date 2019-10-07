<?php
declare(strict_types=1);


// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise(int $x) {
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}

// === Solution ===
// Adding a $x parameter

new_exercise(2);
/***************************/
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;

// === Solution ===
// to get the first element of the array: $week[0]

new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged ! Also very fun";
echo substr($str, 0, 10 );
//use instead mb_substr()

// === Solution ===
// added double quotes to the string
//wrong symbols for "
//this character “ is multibyte

new_exercise(4);

// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

//https://stackoverflow.com/questions/40913839/php-changing-array-value-in-foreach 3
foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}

print_r($week);

// === Solution ===
// added a & (ampersand) before the $day
//value vs reference:
//by default php passing a function by value
//memory location: passing value by reference

new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
$len = 0;
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    $len++;
    if ($len == 27) {
        break;
    }
    array_push($arr, $letter);

}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array

// === Solution ===
// adding a condition and a counter to stop the for loop when 'z' ($len == 27) is reached
//better using range function or ord()

new_exercise(6);
// === exercise 6 ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!

$arr = [];


function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    foreach($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    return implode($params, " - ");
}


function randomGenerate($arr, $amount) {
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }

    return $amount;
}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[rand(0,count($heroes)-1)][rand(0, 10)];

    return $randname;
}

echo "Here is the name: " . combineNames();

// === Solution ===
// changed echos to returns
//adding -1 to count($heroes) in $randname
//adding & to param in foreach($params as &$param)
//removing an extra function, randomgenerate

new_exercise(7);
function copyright(int $year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo(copyright((int)date('Y')));

// === Solution ===
// casting date to int
//echoing the result of the function

new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        return 'Welcome John'.' Smith'."<br>";
    }
    return 'No access'."<br>";
}
//should great the user with his full name (John Smith)
$login = login('john@example', 'pocahontas');
echo $login;
//no access
$login = login('john@example', 'dfgidfgdfg');
echo $login;
//no access
$login = login('wrong@example', 'wrong');
echo $login;

// === Solution ===
// combining first with second name in a string
//added echos

new_exercise(9);
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br>';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
$link = isLinkValid('http://www.google.com/hack.pdf');
echo $link;
//invalid link
$link = isLinkValid('https://google.com');
echo $link;
//VALID link
$link = isLinkValid('http://google.com');
echo $link;
//VALID link
$link = isLinkValid('http://google.com/test.txt');
echo $link;

// === Solution ===
// adding echos
//adding strpos($link, $unacceptable) !== false
//because the first 'https' is not being picked up
//strpos should check type and value
//otherwise is automatically casting

new_exercise(10);

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself

$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];

$diff = count($areTheseFruits)-count($validFruits);
for($i=0; $i <= count($areTheseFruits)+$diff; $i++) {

    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }


}
var_dump($areTheseFruits);//do not change this

// === Solution ===
// changing < to <=
//adding the difference between the length of the two arrays
//or use a foreach
//foreach($areTheseFruits AS $key => $fruit){...}