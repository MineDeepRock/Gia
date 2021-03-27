<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_pmmp\IceStalactiteGiaPMMP;

class IceStalactiteGrainEntity extends GiaGrainEntity
{
    const NAME = "IceBall";

    function onActive(): void {
        IceStalactiteGiaPMMP::onHit($this->invoker, $this->target, $this->scheduler);
    }
}