<?php


namespace gia\pmmp\directions;


use pocketmine\block\Ice;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskScheduler;

class ActivatedIceBallDirection
{
    static function summon(Level $level, Vector3 $center, TaskScheduler $taskScheduler): void {
        $replacedBlocks = [];

        $vectors = [
            $center,
            $center->add(1),
            $center->add(-1),
            $center->add(0, 0, 1),
            $center->add(0, 0, -1),
        ];

        foreach ($vectors as $vector) {
            $replacedBlocks[] = $level->getBlock($vector);
            $level->setBlock($vector, new Ice());
        }


        $taskScheduler->scheduleDelayedTask(new ClosureTask(function (int $tick) use ($level, $replacedBlocks): void {
            foreach ($replacedBlocks as $replacedBlock) {
                $level->setBlock($replacedBlock, $replacedBlock);
            }
        }), 20 * 0.5);
    }
}