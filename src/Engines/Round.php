<?php

namespace Beweb\Td\Engines;

use Beweb\Td\Models\Character;

class Round
{

  static int $number_of_round = 0;
  public $round_arena;
  public string $result = "";

  public function __construct($arena)
  {
    $this->round_arena = $arena;
    self::$number_of_round++;

    $attacker = $this->getFighter();
    $defender = $this->getFighter();

    echo "\n". "Nous avons ". count($this->round_arena) . " joueurs dans l'arène !!";
    $this->result .= "\n" . "- Round : " . self::$number_of_round . " FIGHT !";
    $this->fight($attacker, $defender);

    echo $this->result;
    return $this->round_arena;
  }

  private function getFighter()
  {
    return $this->round_arena[rand(0, (count($this->round_arena) - 1))];
  }

  private function fight($attacker, $defender)
  {
    if ($attacker->name === $defender->name) {
      $defender->hp -= $attacker->att;
      $this->result .= "\n" . "$attacker->name se frappe lui même !?!".
      "\n"."résumé point de vie du $attacker->name :  $attacker->hp,  ";
      $this->isDefenderDead($defender);

    } elseif ($attacker->name != $defender->name) {

      $defender->hp -= $attacker->att;
      $this->result .= "\n" . "$attacker->name attaque le $defender->name".
      "\n"."résumé point de vie du $attacker->name :  $attacker->hp,  ".
      "\n"."résumé point de vie du $defender->name :  $defender->hp,  ";
      $this->isDefenderDead($defender);
    }
  }

  private function isDefenderDead($defender)
  {
    if ($defender->hp <= 0) {
      $this->result .= "\n" . "le $defender->name a passé l'arme a gauche, il reste " .count($this->round_arena)-1 . "joueur/s dans l'arene " . "\n" . "\n";
      $key = array_search($defender, $this->round_arena);
      array_splice($this->round_arena, $key, 1);
    }
  }
}
