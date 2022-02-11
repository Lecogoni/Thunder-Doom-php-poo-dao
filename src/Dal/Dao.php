<?php

namespace Beweb\Td\DAL;

class DAO
{

  private static $instance = null;
  public string $datasource;

  public function __construct()
  {
  }

  public static function getInstance($datasource)
  {
    if (self::$instance == null) {
      self::$instance = new Dao();
      self::$datasource = $datasource;
    }
    return self::$instance;
  }

  /**
   * return an an array containing the data store in ./db/data.json
   */
  public function get_data()
  {
    $values = file_get_contents("./db/data.json");
    $values_as_Array = json_decode($values, true);
    return $values_as_Array;
  }

  /**
   * Store as a string the params in the ./db/data.json
   */
  public function save_data(mixed $data)
  {

    $toFile = json_encode($data);
    file_put_contents("./db/data.json", $toFile);
  }
}
