<?php


namespace gia\pmmp\entities;


use gia\pmmp\gia_pmmp\IceBallGiaPMMP;

class IceBallEntity extends GiaGrainEntity
{
    const NAME = "IceBall";

    function onActive(): void {
        IceBallGiaPMMP::onHit($this->invoker, $this->target);
        $this->kill();
    }
}