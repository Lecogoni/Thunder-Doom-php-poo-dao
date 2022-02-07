<?php

class Dao
{

  private static $instance = null;
  static string $datasource;

  private function __construct()
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
   * return an an array conrtaining the data store in ./db/data.json
   */
  public function get_data()
  {
    $values = file_get_contents("./db/data.json");
    $values_as_Array = json_decode($values, true);
    return $values_as_Array;
  }

  /**
   * Store as sa string the params in the ./db/data.json
   */
  public function save_data(mixed $data)
  {
  
    $toFile = json_encode($data);
    file_put_contents("./db/data.json", $toFile);
  }


  /**
   * 
   */
  public function load_job($hp, $attack, $defense){

    $this->hpmultiplicator = 2;
    $this->attackmultiplicator = 2;
    $this->defensemultiplicator = 2;

    $job = new Job;


  }




}

