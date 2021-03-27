<?php


namespace gia\pmmp\services;


use gia\models\Gia;
use gia\models\GiaEffectTargetType;
use gia\pmmp\utilities\EntityFinder;
use gia\pmmp\utilities\ExecuteGiaEffectOnPMMP;
use gia\store\PlayerStatusStore;
use pocketmine\Player;

class ExecuteGiaEffectForAllies
{
    static function execute(Player $invoker, Gia $gia): void {
        foreach ($gia->getGiaEffects() as $giaEffect) {
            if (!$giaEffect->getTargetType()->equals(GiaEffectTargetType::Allies())) continue;

            $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
            $teamId = $invokerStatus === null ? null : $invokerStatus->getTeamId();
            if ($teamId === null) {
                $giaEffectTargets = [];
            } else {
                $giaEffectTargets = EntityFinder::getAroundAllies($teamId, $invoker->getLevel(), $invoker->getPosition(), $giaEffect->getRange());
            }

            foreach ($giaEffectTargets as $giaEffectTarget) {
                if ($giaEffectTarget instanceof Player) {
                    ExecuteGiaEffectOnPMMP::execute($giaEffect, $giaEffectTarget);
                }
            }
        }
    }
}