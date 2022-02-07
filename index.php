<?php
require("./vendor/autoload.php");

use Beweb\Td\Engines\Game;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;


$qty = 3;
$character = new Character(new Human, new Warrior);


/**
 * ICI LA CREATION ET LANCEMENT DE MON JEU
 */

// $my_game = new Game;
// $my_game->add_character($qty);
// $my_game->start();




// ACCESSING DATA

// file_get_contents() ; lit le contenu d'un fichier
// file_put_contents() ; écrit d'un fichier

$values = file_get_contents("./db/data.json");
//echo $values;

$values_as_Array = json_decode($values, true);
// true indique que l'on veut retourner nos data en tableau associatif

//var_dump($values_as_Array);


foreach ($values_as_Array as $key => $value) {
  echo  $key;
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
