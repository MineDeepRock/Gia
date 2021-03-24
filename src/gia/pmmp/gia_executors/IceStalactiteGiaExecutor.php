<?php


namespace gia\pmmp\gia_executors;


use gia\models\attack_gia\IceStalactiteGia;
use gia\pmmp\directions\LockOnIceStalactiteGiaDirection;
use gia\pmmp\directions\ReadyIceStalactiteGiaDirection;
use gia\pmmp\services\ActivateAttackGia;
use gia\pmmp\utilities\EntityFinder;
use gia\store\PlayerStatusStore;
use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskScheduler;

class IceStalactiteGiaExecutor
{
    static function execute(Player $invoker, Entity $target, TaskScheduler $scheduler): void {
        $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
        $center = $target->asVector3();
        $level = $invoker->getLevel();
        ReadyIceStalactiteGiaDirection::summon($level, $center);

        if ($invokerStatus->getTeamId() === null) {
            $targets = EntityFinder::getAroundEntities($level, $center, IceStalactiteGia::Range);
        } else {
            $targets = EntityFinder::getAroundEnemies($invokerStatus->getTeamId(), $level, $center, IceStalactiteGia::Range);
        }

        $scheduler->scheduleDelayedTask(new ClosureTask(function (int $tick) use ($level, $invoker, $center, $targets): void {
            if (!$invoker->isOnline()) return;
            LockOnIceStalactiteGiaDirection::summon($level, $targets);
            ActivateAttackGia::execute($invoker, $center, new IceStalactiteGia(), $targets);
        }), 20 * 0.5);
    }
}