<?php


namespace gia\pmmp\utilities;


use pocketmine\level\Level;
use pocketmine\math\Vector3;

class GetAroundPlayers
{
    static function execute(Level $level, Vector3 $vector3, float $distance): array {
        $players = [];

        foreach ($level->getPlayers() as $player) {
            if ($player->distance($vector3) <= $distance) $players[] = $player;
        }

        return $players;
    }
}