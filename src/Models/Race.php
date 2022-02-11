<?php

namespace Beweb\Td\Models;;

class Race
{

  public string $name;
  public int $id;
  public int $hp;
  public int $attack;
  public int $defense;
  protected Stats $modifiers;

  function __construct($id, $name, $hp, $attack, $defense)
  {

    $this->id = $id;
    $this->name = $name;
    $this->hp = $hp;
    $this->attack = $attack;
    $this->defense = $defense;
    $this->modifiers = new Stats();
  }

  /**
   * retourne l'ensemble des stats du character qui l'appelle
   */
  public function accessModifiersData()
  {
    return $this->modifiers;
  }
};
