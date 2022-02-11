<?php

namespace Beweb\Td\DAL;

// use Beweb\Td\DAL\Dao;
use Beweb\Td\Models\Race;

/**
 * objectif fabriquer des objet Job
 * load() retourne un Job
 * find_by_id() retourne  un job
 */

class DAORace extends Dao
{

  function __construct()
  {
    $this->datasource = "./db/race.json";
  }

  /**
   * Recup les datas du json, convert en Hash (array clé valeur)
   * New instance de Job avec les arguments recupéré du Json
   */
  function load(): array
  {
    $races = [];
    $datas = json_decode(file_get_contents($this->datasource), true);
    foreach ($datas as  $data) {
      $r = new Race($data["id"], $data["name"], $data["hp"], $data["attack"], $data["defense"]);
      array_push($races, $r);
    }
    return $races;
  }

  /**
   *  
   */
  function persist($name)
  {
    $datas = json_decode(file_get_contents($this->datasource), true);
    $race = array(
      "id" => count($datas) + 1,
      "name" => $name,
    );
    $toFile = json_encode($race);
    file_put_contents($this->datasource, $toFile);
  }


  function find_by_id(int $id): mixed
  {
    $datas = json_decode(file_get_contents($this->datasource), true);
    foreach ($datas as $data) {
      if ($data["id"] === $id) {
        $result = new Race($data["id"], $data["name"], $data["hp"], $data["attack"], $data["defense"]);
        return $result;
      }
    }
    return false;
  }

  function find_by_name(mixed $name): mixed
  {
    foreach ($this->load() as $race) {
      if ($race->name == $name) return $race;
    }
  }
}
