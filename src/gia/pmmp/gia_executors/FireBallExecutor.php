<?php


namespace gia\pmmp\gia_executors;


use gia\models\attack_gia\FireBallGia;
use gia\pmmp\directions\ActivatedFireBallDirection;
use gia\pmmp\services\ActivateAttackGiaPMMPService;
use pocketmine\entity\Entity;
use pocketmine\Player;

class FireBallExecutor
{
    static function execute(Player $invoker, Entity $target): void {
        if (!$invoker->isOnline()) return;
        ActivatedFireBallDirection::summon($invoker->getLevel(), $target->getPosition());
        ActivateAttackGiaPMMPService::execute($invoker, $target->getPosition(), new FireBallGia(), [$target]);
    }
}