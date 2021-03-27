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
    static function invoke(Player $invoker, array $targets, TaskScheduler $scheduler): void {
        if (count($targets) === 0) return;

        usort($targets, fn($a, $b) => self::sortTargetsListByCloser($invoker->getPosition(), $a, $b));
        $first = $targets[0];


        $nbt = new CompoundTag('', [
            'Pos' => new ListTag('Pos', [
                new DoubleTag('', $first->getX() + random_int(-3, 3)),
                new DoubleTag('', $first->getY() + 1),
                new DoubleTag('', $first->getZ() + random_int(-3, 3))
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

        $entity = new LavaWaveChildEntity($invoker->getLevel(), $nbt, $invoker, $targets, $scheduler);
        $entity->spawnToAll();
    }

    static function onHit(Player $invoker, Entity $target) {
        if (!$invoker->isOnline()) return;
        $gia = new LavaWaveGia();
        ActivatedLavaWaveDirection::summon($invoker->getLevel(), $target->getPosition());
        AttackByGiaPMMPService::execute($gia, $invoker, $target);
    }

    static function sortTargetsListByCloser(Vector3 $pole, Entity $a, Entity $b) {
        return $a->distance($pole) > $b->distance($pole) ? 1 : -1;
    }
}