<?php


namespace gia\pmmp\entities;



use gia\pmmp\gia_pmmp\FireBallGiaPMMP;

class FIreBallEntity extends GiaGrainEntity
{
    const NAME = "FireBall";

    function onActive(): void {
        FireBallGiaPMMP::onHit($this->invoker, $this->target);
    }
}