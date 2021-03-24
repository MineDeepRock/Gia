<?php


namespace gia\pmmp\services;


use gia\models\AbilityGiaEffect;
use gia\models\GiaEffect;
use gia\pmmp\utilities\FindGiaEffectTargets;
use gia\store\PlayerStatusStore;
use pocketmine\math\Vector3;
use pocketmine\Player;

class ExecuteGiaEffectPMMPService
{
    static function execute(Player $invoker, Vector3 $executedPosition, GiaEffect $giaEffect): void {
        $targets = FindGiaEffectTargets::execute($invoker, $executedPosition, $giaEffect);

        foreach ($targets as $target) {
            $status = PlayerStatusStore::findByName($target->getName());
            if ($giaEffect instanceof AbilityGiaEffect) {
                $status->addAbilityGiaEffect($giaEffect);
            } else {
                //TODO
            }
        }
    }
}