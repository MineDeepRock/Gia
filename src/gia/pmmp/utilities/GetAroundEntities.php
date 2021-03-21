<?php


namespace gia\pmmp\utilities;


use pocketmine\level\Level;
use pocketmine\math\Vector3;

class GetAroundEntities
{
    static function execute(Level $level, Vector3 $vector3, float $distance): array {
        $entities = [];

        foreach ($level->getEntities() as $entity) {
            if ($entity->distance($vector3) <= $distance) $entities[] = $entity;
        }

        return $entities;
    }
}