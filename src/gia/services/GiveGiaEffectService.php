<?php


namespace gia\services;


use gia\data\GiaEffect;
use gia\store\PlayerStatusStore;

class GiveGiaEffectService
{
    static function execute(string $name, GiaEffect $giaEffect): void {
        $status = PlayerStatusStore::findByName($name);
    }
}