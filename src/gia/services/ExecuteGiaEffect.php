<?php


namespace gia\services;


use gia\models\AbilityGiaEffect;
use gia\models\GiaEffect;
use gia\store\PlayerStatusStore;

class ExecuteGiaEffect
{
    static function execute(GiaEffect $giaEffect, array $targetPlayerNames): void {
        if ($giaEffect instanceof AbilityGiaEffect) {
            foreach ($targetPlayerNames as $targetPlayerName) {
                $status = PlayerStatusStore::findByName($targetPlayerName);
                if ($status === null) continue;
                $status->addAbilityGiaEffect($giaEffect);
            }
        } else {
            //TODO:AbilityGiaEffect以外も実装
        }
    }
}