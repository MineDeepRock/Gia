<?php


namespace gia\pmmp\gia_executors;


use gia\models\attack_gia\IceBallGia;
use gia\pmmp\directions\ActivatedIceBallDirection;
use gia\pmmp\services\ActivateAttackGiaPMMPService;
use pocketmine\entity\Entity;
use pocketmine\Player;

class IceBallExecutor
{
    static function execute(Player $invoker, Entity $target): void {
        if (!$invoker->isOnline()) return;
        ActivatedIceBallDirection::summon($invoker->getLevel(), $target->getPosition());
        ActivateAttackGiaPMMPService::execute($invoker, $target->getPosition(), new IceBallGia(), [$target]);
    }
}