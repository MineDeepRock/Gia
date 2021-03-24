<?php


namespace gia\pmmp\utilities;


use gia\models\Gia;
use gia\models\GiaTargetType;
use gia\store\PlayerStatusStore;
use pocketmine\entity\Entity;
use pocketmine\Player;

class FindGiaTarget
{
    static function execute(Player $invoker, Gia $gia): ?Entity {
        $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
        $teamId = $invokerStatus === null ? null : $invokerStatus->getTeamId();

        if ($gia->getGiaTargetType()->equals(GiaTargetType::SingleEnemy())) {
            if ($teamId === null) {
                return EntityFinder::getClosestEntity($invoker->getLevel(), $invoker->getPosition());
            }
            return EntityFinder::getClosestEnemy($teamId, $invoker->getLevel(), $invoker->getPosition());
        }

        return null;
    }
}