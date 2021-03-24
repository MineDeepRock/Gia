<?php


namespace gia\pmmp\directions;


use gia\models\attack_gia\IceStalactiteGia;
use pocketmine\block\Ice;
use pocketmine\level\Level;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;

class ReadyIceStalactiteGiaDirection
{
    static function summon(Level $level, Vector3 $center) {

        for ($i = 0; $i < 360; $i += 45) {
            $x = IceStalactiteGia::Range * sin(deg2rad($i));
            $z = IceStalactiteGia::Range * cos(deg2rad($i));

            $pos = $center->add($x, 0.3, $z);

            $level->addParticle(new DestroyBlockParticle($pos, new Ice()));
        }
    }
}