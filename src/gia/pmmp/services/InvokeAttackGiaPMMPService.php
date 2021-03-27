<?php


namespace gia\pmmp\services;


use gia\models\attack_gia\FireBallGia;
use gia\models\attack_gia\IceBallGia;
use gia\models\attack_gia\IceStalactiteGia;
use gia\models\attack_gia\LavaWaveGia;
use gia\models\AttackGia;
use gia\pmmp\gia_pmmp\FireBallGiaPMMP;
use gia\pmmp\gia_pmmp\IceBallGiaPMMP;
use gia\pmmp\gia_pmmp\IceStalactiteGiaPMMP;
use gia\pmmp\gia_pmmp\LavaWaveGiaPMMP;
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

        $target = FindGiaTarget::execute($invoker);
        if ($target === null) return;

        switch ($gia::NAME) {
            case FireBallGia::NAME:
                FireBallGiaPMMP::invoke($invoker, $target, $scheduler);
                return;
            case LavaWaveGia::NAME:
                LavaWaveGiaPMMP::invoke($invoker, $target, $scheduler);
                return;
            case IceBallGia::NAME:
                IceBallGiaPMMP::invoke($invoker, $target, $scheduler);
                return;
            case IceStalactiteGia::NAME:
                IceStalactiteGiaPMMP::invoke($invoker, $target, $scheduler);
                return;
        }
    }
}