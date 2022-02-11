<?php

namespace Beweb\Td\Engines;

use Beweb\Td\DAL\DAOCharacter;
use Beweb\Td\Engines;
use Beweb\Td\Engines\Arena;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl;


use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;

class Game
{
  private $arena; //array
  private bool $gameOver;

  public function __construct()
  {
    $this->arena = new Arena;
    $this->gameOver = false;
  }

  public function add_character($qty)
  {
    // get random race from array
    function getARace()
    {
      $races = [];
      $datas = json_decode(file_get_contents("./db/race.json"), true);
      foreach ($datas as $data) {
        array_push($races, $data["name"]);
      }
      return $races[rand(0, (count($races) - 1))];
    }

    // get random job from  array
    function getAJob()
    {
      $jobs = [];
      $datas = json_decode(file_get_contents("./db/job.json"), true);
      foreach ($datas as $data) {
        array_push($jobs, $data["name"]);
      }
      return $jobs[rand(0, (count($jobs) - 1))];
    }


    /**
     * Use to catch the name of the character Race name
     * in order to assign it as Name for the new Character
     */
    function getCharacterRaceName($character)
    {
      $character_race = $character->getRace();
      $racer_class =  get_class($character_race);
      $racer_class_array = explode("\\", $racer_class);
      $race_name = $racer_class_array[(count($racer_class_array)) - 1];
      return $race_name;
    }

    $DAOCharacter = new DAOCharacter;

    /**
     * Loop on the number of Characters we want to create
     * number decided in index.php ($qty)
     */
    while ($qty > 0) {
      // set a new Character

      $character = $DAOCharacter->new_character(getARace(), getAJob());
      $character->name = "fighter-" . $qty;
      /* OLD METHOD SANS DAO

      $character = new Character(getARace(), getAJob());
      // Set the name of the new caracter 
      $character->setName(getCharacterRaceName($character) . "_" . $qty);

      //$character->showCharacterstats();

      */

      // add the new character to the Arena->pit
      array_push($this->arena->pit, $character);
      $qty--;
    }

    //var_dump($this->arena->pit);
  }

  public function start()
  {
    $arena = $this->arena->pit;

    while ($this->gameOver != true) {

      $round = new Round($arena);

      $arena = $round->round_arena;

      if (count($arena) <= 1) {
        $this->gameOver = true;
        echo "\n" . 'we got a winner --> ' . $arena[0]->name . " !! \n";
        // affiche les infos du winner et fin de jeu
      }

      //$this->gameOver = true;
    }
  }
}
