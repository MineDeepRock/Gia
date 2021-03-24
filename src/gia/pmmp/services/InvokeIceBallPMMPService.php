<?php


namespace gia\pmmp\services;


use gia\models\attack_gia\IceBallGia;
use gia\pmmp\utilities\FindGiaTarget;
use gia\pmmp\utilities\SpawnIceBall;
use pocketmine\Player;

class InvokeIceBallPMMPService
{
    static function execute(Player $invoker): void {
        $gia = new IceBallGia();

        $result = InvokeAttackGia::execute($invoker, $gia);
        if (!$result) return;

        $target = FindGiaTarget::execute($invoker, $gia);
        if ($target === null) return;

        //TODO:ここから下だけIceBall用
        SpawnIceBall::execute($invoker, $target);
    }
}