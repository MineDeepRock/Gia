<?php


namespace gia\pmmp\gia_pmmp;


use gia\models\attack_gia\IceStalactiteGia;
use gia\pmmp\directions\ActivatedIceStalactiteGiaDirection;
use gia\pmmp\entities\IceStalactiteChildEntity;
use gia\pmmp\services\AttackByGiaPMMPService;
use gia\pmmp\services\ExecuteGiaEffectForEnemyPMMPService;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskScheduler;

class IceStalactiteGiaChildPMMP extends GiaPMMP
{
    static function invoke(Player $invoker, Entity $target, TaskScheduler $scheduler): void {
        $nbt = new CompoundTag('', [
            'Pos' => new ListTag('Pos', [
                new DoubleTag('', $target->getX()),
                new DoubleTag('', $target->getY() + 4),
                new DoubleTag('', $target->getZ())
            ]),
            'Motion' => new ListTag('Motion', [
                new DoubleTag('', 0),
                new DoubleTag('', 0),
                new DoubleTag('', 0)
            ]),
            'Rotation' => new ListTag('Rotation', [
                new FloatTag("", 0),
                new FloatTag("", 0)
            ]),
        ]);
        $childEntity = new IceStalactiteChildEntity($invoker->getLevel(), $nbt, $invoker, $target, $scheduler);
        $childEntity->setSpeed(1);
        $childEntity->setImmobile(true);
        $childEntity->spawnToAll();

        $scheduler->scheduleDelayedTask(new ClosureTask(
            function (int $currentTick) use ($childEntity): void {
                if ($childEntity->isAlive()) {
                    $childEntity->setImmobile(false);
                }
            }
        ), 20 * 0.5);

    }

    static function onHit(Player $invoker, Entity $target) {
        if (!$invoker->isOnline()) return;
        $gia = new IceStalactiteGia();
        ActivatedIceStalactiteGiaDirection::summon($invoker->getLevel(), $target);
        AttackByGiaPMMPService::execute($gia, $invoker, $target);
        ExecuteGiaEffectForEnemyPMMPService::execute($invoker, $target, $gia);
    }
}