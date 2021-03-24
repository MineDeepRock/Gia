<?php


namespace gia\pmmp\utilities;


use gia\store\PlayerStatusStore;
use pocketmine\entity\Entity;
use pocketmine\Player;

class FindGiaTarget
{
    static function execute(Player $invoker): ?Entity {
        $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
        $teamId = $invokerStatus === null ? null : $invokerStatus->getTeamId();

        if ($teamId === null) {
            return EntityFinder::getClosestEntity($invoker->getLevel(), $invoker->getPosition());
        }

        return EntityFinder::getClosestEnemy($teamId, $invoker->getLevel(), $invoker->getPosition());
    }
}