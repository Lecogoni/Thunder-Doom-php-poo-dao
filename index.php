<?php

use Beweb\Td\DAL\DAOCharacter;
use Beweb\Td\DAL\DAOJob;
use Beweb\Td\DAL\DAORace;
use Beweb\Td\Engines\Game;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;

require("./vendor/autoload.php");


/**
 * IMPLEMENTING MVC MODEL
 */
var_dump($_GET);
echo "<br>";

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

echo "SCRIPT NAME : " . $_SERVER['SCRIPT_NAME'] . "\n";
echo "<br>";
echo "SCRIPT FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "\n";
echo "<br>";
echo "ROOT CONST : " . ROOT  . "\n";
echo "<br>";
echo "WEB-ROOT CONST : " . WEBROOT  . "\n";
echo "<br>";

//require_once(ROOT . 'app/Model.php');
// require_once(ROOT . 'app/Controller.php');

echo "FINAL PATH : " . $mypath = ROOT . 'Core/Controller.php';
require(ROOT . 'Core/Controller.php');
echo "<br>";
echo "<br>";
var_dump($_GET['p']);

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if ($params[0] != "") {
  // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
  $controller = ucfirst($params[0]);
  echo $controller;

  // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
  $action = isset($params[1]) ? $params[1] : 'index';
  echo $action;
} else {
  // Ici aucun paramètre n'est défini
}




/**
 * ICI LA CREATION ET LANCEMENT DE MON JEU
 */


$qty = 3;
//$character = new Character(new Human, new Warrior);

// $my_game = new Game;
// $my_game->add_character($qty);
// $my_game->start();


/* USE OF DAO
-------------------------------------------------------------------*/

// $test = new DAOCharacter;
// $char1 = $test->new_character("Human", "Druid");
// var_dump($char1);
// var_dump($test->load());
// $test->persist($char1);



/* ACCESSING DATA - Apprentissage
-------------------------------------------------------------------*/

// file_get_contents() ; lit le contenu d'un fichier
// file_put_contents() ; écrit d'un fichier

$values = file_get_contents("./db/data.json");
//echo $values;

$values_as_Array = json_decode($values, true);
// true indique que l'on veut retourner nos data en tableau associatif

//var_dump($values_as_Array);

foreach ($values_as_Array as $key => $value) {
  if ($value["id"] = 2) {
    //$values_as_Array[$key]["firstname"] = "toto";
  }
}

//var_dump($values_as_Array);

$toFile = json_encode($values_as_Array);


/**
 * renvoie notre strin $toFile au fichier data.json 
 */
file_put_contents("./db/data.json", $toFile);

// modification de fichier process que l'on pourrait implémenter
// recup tout le fichier
// le stoker en local
// modifier .... 
// remplacer tout le fichiers
