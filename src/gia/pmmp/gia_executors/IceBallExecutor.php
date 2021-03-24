<?php


namespace gia\pmmp\gia_executors;


use gia\models\attack_gia\IceBallGia;
use gia\pmmp\directions\ActivatedIceBallDirection;
use gia\pmmp\services\ActivateAttackGia;
use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class IceBallExecutor
{
    static function execute(Player $invoker, Entity $target, TaskScheduler $scheduler): void {
        if (!$invoker->isOnline()) return;
        ActivatedIceBallDirection::summon($invoker->getLevel(), $target->getPosition(), $scheduler);
        ActivateAttackGia::execute($invoker, $target->getPosition(), new IceBallGia(), [$target]);
    }
}