<?php


namespace gia\pmmp\gia_pmmp;


use gia\models\attack_gia\IceBallGia;
use gia\pmmp\directions\ActivatedIceBallDirection;
use gia\pmmp\entities\IceBallEntity;
use gia\pmmp\services\AttackByGiaPMMPService;
use gia\pmmp\services\ExecuteGiaEffectForEnemyPMMPService;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class IceBallGiaPMMP extends GiaPMMP
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


        $entity = new IceBallEntity($invoker->getLevel(), $nbt, $invoker, $target, $scheduler);
        $entity->spawnToAll();
    }

    static function onHit(Player $invoker, Entity $target) {
        if (!$invoker->isOnline()) return;
        $gia = new IceBallGia();
        ActivatedIceBallDirection::summon($invoker->getLevel(), $target->getPosition());
        AttackByGiaPMMPService::execute($gia, $invoker, $target);
        ExecuteGiaEffectForEnemyPMMPService::execute($invoker, $target, $gia);
    }
}