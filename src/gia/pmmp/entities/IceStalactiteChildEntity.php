<?php


namespace gia\pmmp\entities;



use gia\pmmp\gia_pmmp\IceStalactiteGiaChildPMMP;

class IceStalactiteChildEntity extends GiaGrainEntity
{
    const NAME = "IceBall";

    function onActive(): void {
        IceStalactiteGiaChildPMMP::onHit($this->invoker, $this->target);
    }
}