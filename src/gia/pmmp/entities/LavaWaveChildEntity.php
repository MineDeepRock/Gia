<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_pmmp\LavaWaveGiaChildPMMP;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class LavaWaveChildEntity extends GiaGrainEntity
{
    const NAME = "FireBall";
    public $scale = 0.5;

    public function __construct(Level $level, CompoundTag $nbt, Player $invoker, Entity $target, TaskScheduler $scheduler) {
        parent::__construct($level, $nbt, $invoker, $target, $scheduler);
        $this->setSpeed(0.5);
    }

    function onActive(): void {
        LavaWaveGiaChildPMMP::onHit($this->invoker, $this->target);
    }
}