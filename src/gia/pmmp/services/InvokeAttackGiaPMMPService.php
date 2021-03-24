<?php


namespace gia\pmmp\services;


use gia\models\attack_gia\IceBallGia;
use gia\models\AttackGia;
use gia\pmmp\gia_invokers\IceBallInvoker;
use gia\pmmp\utilities\FindGiaTarget;
use gia\services\InvokeGiaService;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class InvokeAttackGiaPMMPService
{
    static function execute(Player $invoker, AttackGia $gia, TaskScheduler $scheduler): void {
        $result = InvokeGiaService::execute($invoker->getName(), $gia);
        if (!$result) {
            $invoker->sendPopup("Energyが足りません");
        }

        $target = FindGiaTarget::execute($invoker, $gia);
        if ($target === null) return;

        switch ($gia::NAME) {
            case IceBallGia::NAME:
                IceBallInvoker::invoke($invoker, $target, $scheduler);
        }
    }
}