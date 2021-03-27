<?php


namespace gia\pmmp\entities;



use gia\pmmp\gia_pmmp\LavaWaveGiaPMMP;

class LavaWaveGrainEntity extends GiaGrainEntity
{
    const NAME = "FireBall";

    function onActive(): void {
        LavaWaveGiaPMMP::onHit($this->invoker, $this->target, $this->scheduler);
        $this->kill();
    }
}