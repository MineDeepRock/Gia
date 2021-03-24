<?php


namespace gia\utilities;


use gia\models\AttackGia;
use gia\store\PlayerStatusStore;

class CalculateDamage
{
    static function execute(string $attackerName, string $targetName, float $giaDamage): int {
        $damage = $giaDamage;
        $attackerStatus = PlayerStatusStore::findByName($attackerName);
        $targetStatus = PlayerStatusStore::findByName($targetName);

        if ($attackerStatus === null) return 0;

        //プレイヤーじゃないってこと
        if ($targetStatus === null) {
            return $damage * $attackerStatus->getAttackPower()->getAsRate();
        }

        $damage *= $attackerStatus->getAttackPower()->getAsRate();
        $damage /= $targetStatus->getDefensivePower()->getAsRate();
        return $damage;
    }
}