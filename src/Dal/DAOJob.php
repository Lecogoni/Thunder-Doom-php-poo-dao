<?php

namespace Beweb\Td\DAL;

use Beweb\Td\Models\Job;

/**
 * objectif fabriquer des objet Job
 * load() retourne un Job
 * find_by_id() retourne  un job
 */

class DAOJob extends Dao
{

  function __construct()
  {
    $this->datasource = "./db/job.json";
  }

  /**
   * Recup les datas du json, convert en Hash (array clé valeur)
   * New instance de Job avec les arguments recupéré du Json
   */
  function load(): array
  {
    $jobs = [];
    $datas = json_decode(file_get_contents($this->datasource), true);
    foreach ($datas as  $data) {
      $j = new Job($data["id"], $data["name"], $data["att_multi"], $data["def_multi"], $data["hp_multi"]);
      array_push($jobs, $j);
    }
    return $jobs;
  }

  /**
   * Save in json format a job defined by its attibut 
   */
  function persist(mixed $name, int $hp, int $attack, int $defense)
  {
    $job = array(
      "name" => $name,
      "hp" => $hp,
      "attack" => $attack,
      "defense" => $defense
    );
    $toFile = json_encode($job);
    file_put_contents("./db/data.json", $toFile);
  }


  function find_by_id(int $id): mixed
  {
    $data = [];
    $datas = json_decode(file_get_contents($this->datasource), true);
    foreach ($datas as $data) {
      if ($data["id"] === $id) {
        $result = new Job($data["id"], $data["name"], $data["att_multi"], $data["def_multi"], $data["hp_multi"]);
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
