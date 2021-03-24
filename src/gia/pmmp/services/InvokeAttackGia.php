<?php


namespace gia\pmmp\services;


use gia\models\AttackGia;
use gia\services\InvokeGiaService;
use pocketmine\Player;

class InvokeAttackGia
{
    static function execute(Player $invoker, AttackGia $gia): bool {
        $result = InvokeGiaService::execute($invoker->getName(), $gia);
        if (!$result) {
            $invoker->sendPopup("Energyが足りません");
        }

        return $result;
    }
}