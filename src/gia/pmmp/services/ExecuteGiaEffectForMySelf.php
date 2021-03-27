<?php


namespace gia\pmmp\services;


use gia\models\Gia;
use gia\models\GiaEffectTargetType;
use gia\pmmp\utilities\ExecuteGiaEffectOnPMMP;
use pocketmine\Player;

class ExecuteGiaEffectForMySelf
{
    static function execute(Player $invoker, Gia $gia): void {
        foreach ($gia->getGiaEffects() as $giaEffect) {
            if (!$giaEffect->getTargetType()->equals(GiaEffectTargetType::MySelf())) continue;
            ExecuteGiaEffectOnPMMP::execute($giaEffect, $invoker);
        }
    }
}