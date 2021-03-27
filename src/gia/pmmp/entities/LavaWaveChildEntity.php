<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_pmmp\LavaWaveGiaChildPMMP;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class LavaWaveChildEntity extends GiaGrainEntity
{
    const NAME = "FireBall";
    private array $targets;
    private int $targetIndex = 0;

    public function __construct(Level $level, CompoundTag $nbt, Player $invoker, array $targets, TaskScheduler $scheduler) {
        $this->targets = $targets;
        var_dump("最初");
        foreach ($this->targets as $index => $v) {
            var_dump($index . ":" . get_class($v));
        }
        $first = $targets[$this->targetIndex];

        parent::__construct($level, $nbt, $invoker, $first, $scheduler);
        $this->setSpeed(0.5);
    }

    function onActive(): void {
        $this->motion->y = 0.5;

        LavaWaveGiaChildPMMP::onHit($this->invoker, $this->target);
        unset($this->targets[$this->targetIndex]);
        if (count($this->targets) === 0) {
            $this->kill();
            return;
        }

        var_dump("途中");
        foreach ($this->targets as $index => $v) {
            var_dump($index . ":" . get_class($v));
        }

        $this->targetIndex++;
        $this->target = $this->targets[$this->targetIndex];
    }
}