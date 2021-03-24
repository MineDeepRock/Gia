<?php


namespace gia\pmmp\utilities;


use gia\pmmp\entities\IceBall;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class SpawnIceBall
{
    static function execute(Player $invoker, Entity $target, TaskScheduler $scheduler): void {
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


        var_dump(get_class($target));
        $entity = new IceBall($invoker->getLevel(), $nbt, $invoker, $target, $scheduler);
        $entity->spawnToAll();
    }
}