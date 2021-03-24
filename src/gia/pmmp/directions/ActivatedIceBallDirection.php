<?php


namespace gia\pmmp\directions;


use pocketmine\block\Ice;
use pocketmine\level\Level;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;

class ActivatedIceBallDirection
{
    static function summon(Level $level, Vector3 $center): void {
        for ($i = 0; $i < 360; $i += 90) {
            $x = 1.5 * sin(deg2rad($i));
            $z = 1.5 * cos(deg2rad($i));

            $pos = $center->asVector3()->add($x, 0.3, $z);

            $level->addParticle(new DestroyBlockParticle($pos, new Ice()));
        }
    }
}