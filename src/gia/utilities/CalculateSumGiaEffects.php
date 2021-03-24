<?php


namespace gia\utilities;



use gia\models\GiaEffect;

class CalculateSumGiaEffects
{
    /**
     * @param GiaEffect[] $giaEffects
     */
    static function execute(array $giaEffects): void {
        $sum = 0;
        foreach ($giaEffects as $giaEffect) {
            $sum += $giaEffect->getValue();
        }
    }
}