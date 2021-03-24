<?php


namespace gia\pmmp\utilities;


use gia\models\GiaEffect;
use gia\models\GiaEffectTargetType;
use gia\store\PlayerStatusStore;
use pocketmine\math\Vector3;
use pocketmine\Player;

class FindGiaEffectTargets
{
    static function execute(Player $invoker, Vector3 $centerPosition, GiaEffect $giaEffect): array {
        $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
        $teamId = $invokerStatus === null ? null : $invokerStatus->getTeamId();
        if ($teamId === null) return [];

        if ($giaEffect->getTargetType()->equals(GiaEffectTargetType::MySelf())) {
            return [$invoker];
        }

        if ($giaEffect->getTargetType()->equals(GiaEffectTargetType::Allies())) {
            return EntityFinder::getAroundAllies($teamId, $invoker->getLevel(), $centerPosition, $giaEffect->getRange());
        }

        if ($giaEffect->getTargetType()->equals(GiaEffectTargetType::OneEnemy())) {
            return [EntityFinder::getClosestEnemy($teamId, $invoker->getLevel(), $centerPosition)];
        }

        if ($giaEffect->getTargetType()->equals(GiaEffectTargetType::Enemies())) {
            return EntityFinder::getAroundEnemies($teamId, $invoker->getLevel(), $centerPosition, $giaEffect->getRange());
        }

        return [];
    }
}