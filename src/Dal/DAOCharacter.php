<?php

namespace Beweb\Td\DAL;

use Beweb\Td\DAL\Dao;
use Beweb\Td\DAL\DAOJob;
use Beweb\Td\DAL\DAORace;
use Beweb\Td\Models\Character;

class DAOCharacter extends Dao
{

  private int $id;

  function __construct()
  {
    $this->datasource = "./db/character.json";
  }

  function new_character(string $race, string $job)
  {
    $DAOJob = new DAOJob;
    $DAORace = new DAORace;

    $raceObj = $DAORace->find_by_name($race);
    $jobeObj = $DAOJob->find_by_name($job);
    
    $character = new Character($raceObj, $jobeObj);
    $character->name = $raceObj->name . "-" . $jobeObj->name;

    return $character;
  }

  function load(): array
  {
    $characters = [];
    $DAOJob = new DAOJob;
    $DAORace = new DAORace;

    $datas = json_decode(file_get_contents($this->datasource), true);

    foreach ($datas as  $data) {
      $r = new Character($DAORace->find_by_id($data["race"]), $DAOJob->find_by_id($data["job"]));
      $r->id = $data["id"];
      array_push($characters, $r);
    }
    return $characters;
  }

  function persist($character)
  {
    $characters = $this->load();
    $character->id = count($characters) + 1;
    array_push($characters, $character);
    file_put_contents($this->datasource, json_encode($characters));
  }
}
