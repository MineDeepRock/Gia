<?php


namespace gia\pmmp\services;


use gia\models\Gia;
use gia\models\GiaEffectTargetType;
use gia\pmmp\utilities\ExecuteGiaEffectOnPMMP;
use pocketmine\entity\Entity;
use pocketmine\Player;

class ExecuteGiaEffectForEnemyPMMPService
{
    static function execute(Player $invoker, Entity $target, Gia $gia) {
        if (!$invoker->isOnline()) return;
        foreach ($gia->getGiaEffects() as $giaEffect) {
            if (!$giaEffect->getTargetType()->equals(GiaEffectTargetType::Enemy())) continue;
            if ($target instanceof Player) {
                ExecuteGiaEffectOnPMMP::execute($giaEffect, $target);
            }
        }
    }
}