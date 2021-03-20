<?php


namespace gia\utilities;


use gia\data\GiaEffect;

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