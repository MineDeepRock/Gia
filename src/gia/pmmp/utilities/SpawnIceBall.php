<?php


namespace gia\pmmp\utilities;


use gia\pmmp\entities\IceBall;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;

class SpawnIceBall
{
    static function execute(Player $invoker, Entity $target): void {
        $nbt = new CompoundTag('', [
            'Pos' => new ListTag('Pos', [
                new DoubleTag('', $invoker->getX()),
                new DoubleTag('', $invoker->getY()),
                new DoubleTag('', $invoker->getZ())
            ]),
            'Motion' => new ListTag('Motion', [
                new DoubleTag('', $invoker->getDirection()),
                new DoubleTag('', $invoker->getDirection()),
                new DoubleTag('', $invoker->getDirection())
            ]),
            'Rotation' => new ListTag('Rotation', [
                new FloatTag("", 0),
                new FloatTag("", 0)
            ]),
        ]);

        $entity = new IceBall($invoker->getLevel(), $nbt, $invoker, $target);
        $entity->spawnToAll();
    }
}