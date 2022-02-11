<?php

namespace Beweb\Td\Models;

class Job
{

  public string $name;
  public int $id;
  public int $hpmultiplicator;
  public int $attackmultiplicator;
  public int $defensemultiplicator;

  public function __construct($id, $name, $att_multi, $def_multi, $hp_multi)
  {
    $this->id = $id;
    $this->name = $name;
    $this->hpmultiplicator = $hp_multi;
    $this->attackmultiplicator = $att_multi;
    $this->defensemultiplicator = $def_multi;
  }

  function getMultiplicatorHp()
  {
    return $this->hpmultiplicator;
  }

  function getMultiplicatorAttack()
  {
    return $this->attackmultiplicator;
  }

  function getMultiplicatorDefense()
  {
    return $this->defensemultiplicator;
  }
}
