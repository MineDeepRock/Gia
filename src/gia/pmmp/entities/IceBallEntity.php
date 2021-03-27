<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_executors\IceBallExecutor;

class IceBallEntity extends GiaGrainEntity
{
    function onActive(): void {
        IceBallExecutor::execute($this->invoker, $this->target);
    }
}