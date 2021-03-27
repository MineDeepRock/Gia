<?php


namespace gia\pmmp\directions;


use gia\models\attack_gia\IceStalactiteGia;
use pocketmine\level\Level;
use pocketmine\level\particle\LavaParticle;
use pocketmine\math\Vector3;

class ReadyLavaWaveGiaDirection
{
    static function summon(Level $level, Vector3 $center) {

        for ($i = 0; $i < 360; $i += 45) {
            $x = IceStalactiteGia::Range * sin(deg2rad($i));
            $z = IceStalactiteGia::Range * cos(deg2rad($i));

            $pos = $center->add($x, 0.3, $z);

            $level->addParticle(new LavaParticle($pos));
        }
    }
}