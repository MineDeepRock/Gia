<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_executors\FireBallExecutor;

class FIreBallEntity extends GiaGrainEntity
{
    function onActive(): void {
        FireBallExecutor::execute($this->invoker, $this->target);
    }
}