<?php


namespace gia\pmmp\gia_pmmp;


use gia\models\attack_gia\LavaWaveGia;
use gia\pmmp\directions\ActivatedIceBallDirection;
use gia\pmmp\directions\ActivatedLavaWaveDirection;
use gia\pmmp\entities\LavaWaveChildEntity;
use gia\pmmp\services\AttackByGiaPMMPService;
use pocketmine\entity\Entity;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class LavaWaveGiaChildPMMP
{
    static function invoke(Player $invoker, Entity $target, Vector3 $parentPosition, TaskScheduler $scheduler): void {
        $nbt = new CompoundTag('', [
            'Pos' => new ListTag('Pos', [
                new DoubleTag('', $parentPosition->getX()),
                new DoubleTag('', $parentPosition->getY()),
                new DoubleTag('', $parentPosition->getZ())
            ]),
            'Motion' => new ListTag('Motion', [
                new DoubleTag('', 0),
                new DoubleTag('', 0.5),
                new DoubleTag('', 0)
            ]),
            'Rotation' => new ListTag('Rotation', [
                new FloatTag("", 0),
                new FloatTag("", 0)
            ]),
        ]);

        $entity = new LavaWaveChildEntity($invoker->getLevel(), $nbt, $invoker, $target, $scheduler);
        $entity->spawnToAll();
    }

    static function onHit(Player $invoker, Entity $target) {
        if (!$invoker->isOnline()) return;
        $gia = new LavaWaveGia();
        ActivatedLavaWaveDirection::summon($invoker->getLevel(), $target->getPosition());
        AttackByGiaPMMPService::execute($gia, $invoker, $target);
    }
}