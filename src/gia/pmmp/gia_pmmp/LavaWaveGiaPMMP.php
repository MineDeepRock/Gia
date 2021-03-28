<?php


namespace gia\pmmp\gia_pmmp;


use gia\models\attack_gia\LavaWaveGia;
use gia\pmmp\directions\ActivatedLavaWaveDirection;
use gia\pmmp\directions\ReadyLavaWaveGiaDirection;
use gia\pmmp\entities\LavaWaveGrainEntity;
use gia\pmmp\services\AttackByGiaPMMPService;
use gia\pmmp\utilities\EntityFinder;
use gia\store\PlayerStatusStore;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class LavaWaveGiaPMMP
{
    static function invoke(Player $invoker, Entity $target, TaskScheduler $scheduler): void {
        $nbt = new CompoundTag('', [
            'Pos' => new ListTag('Pos', [
                new DoubleTag('', $invoker->getX()),
                new DoubleTag('', $invoker->getY() + 1),
                new DoubleTag('', $invoker->getZ())
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


        $entity = new LavaWaveGrainEntity($invoker->getLevel(), $nbt, $invoker, $target, $scheduler);
        $entity->spawnToAll();
    }

    static function onHit(Player $invoker, Entity $mainTarget, TaskScheduler $scheduler) {
        if (!$invoker->isOnline()) return;
        $invokerStatus = PlayerStatusStore::findByName($invoker->getName());
        $center = $mainTarget->asVector3();
        $level = $invoker->getLevel();
        ReadyLavaWaveGiaDirection::summon($level, $center);

        if ($invokerStatus->getTeamId() === null) {
            $targets = EntityFinder::getAroundEntities($level, $center, LavaWaveGia::Range);
        } else {
            $targets = EntityFinder::getAroundEnemies($invokerStatus->getTeamId(), $level, $center, LavaWaveGia::Range);
        }

        foreach ($targets as $target) {
            if ($target->getId() === $mainTarget->getId()) {
                $gia = new LavaWaveGia();
                ActivatedLavaWaveDirection::summon($invoker->getLevel(), $mainTarget->getPosition());
                AttackByGiaPMMPService::execute($gia, $invoker, $mainTarget);
            } else {
                LavaWaveGiaChildPMMP::invoke($invoker, $target, $mainTarget->getPosition(), $scheduler);
            }
        }
    }
}