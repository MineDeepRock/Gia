<?php


namespace gia\utilities;


use gia\store\PlayerStatusStore;

class CalculateHitRate
{
    static function execute(string $attackerName, string $targetName, float $giaHitRate): float {
        $hitRate = $giaHitRate;
        $attackerStatus = PlayerStatusStore::findByName($attackerName);
        $targetStatus = PlayerStatusStore::findByName($targetName);
        if ($attackerStatus === null) return 0;

        $hitRate *= $attackerStatus->getHitRate()->getAsRate();

        //プレイヤーじゃないってこと
        if ($targetStatus === null) {
            return $hitRate;
        }

        $hitRate /= $targetStatus->getEvadeRate()->getAsRate();

        return $hitRate;
    }
}