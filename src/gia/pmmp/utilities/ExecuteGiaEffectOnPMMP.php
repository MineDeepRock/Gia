<?php


namespace gia\pmmp\utilities;


use gia\models\AbilityGiaEffect;
use gia\models\GiaEffect;
use gia\store\PlayerStatusStore;
use pocketmine\Player;

class ExecuteGiaEffectOnPMMP
{
    static function execute(GiaEffect $giaEffect, Player $target): void {
        $status = PlayerStatusStore::findByName($target->getName());
        if ($giaEffect instanceof AbilityGiaEffect) {
            $status->addAbilityGiaEffect($giaEffect);
        } else {
            //TODO
        }
    }
}