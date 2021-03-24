<?php


namespace gia\utilities;


use gia\models\AttackGia;
use gia\store\PlayerStatusStore;

class CalculateDamage
{
    static function execute(string $attackerName, string $targetName, AttackGia $gia): int {
        $damage = $gia::Damage;
        $attackerStatus = PlayerStatusStore::findByName($attackerName);
        $targetStatus = PlayerStatusStore::findByName($targetName);

        if ($attackerStatus === null) return 0;

        //プレイヤーじゃないってこと
        if ($targetStatus === null) {
            return $damage * $attackerStatus->getAttackPower()->getAsRate();
        }

        $hitRate = $attackerStatus->getHitRate()->getAsRate();
        $hitRate *= $gia::HitRate;
        $hitRate /= $targetStatus->getEvadeRate()->getAsRate();

        //あたっていない
        //TODO:あたったかどうかは他で判断する
        if (random_int(1, 100) < $hitRate * 100) {
            return -1;
        }

        $damage *= $attackerStatus->getAttackPower()->getAsRate();
        $damage /= $targetStatus->getDefensivePower()->getAsRate();

        return $damage;
    }
}