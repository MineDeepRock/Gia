<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_executors\IceStalactiteGiaExecutor;

class IceStalactiteGrainEntity extends GiaGrainEntity
{
    function onActive(): void {
        IceStalactiteGiaExecutor::execute($this->invoker, $this->target, $this->scheduler);
    }
}