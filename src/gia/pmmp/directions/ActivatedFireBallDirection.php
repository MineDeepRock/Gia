<?php


namespace gia\pmmp\directions;


use pocketmine\level\Level;
use pocketmine\level\particle\LavaParticle;
use pocketmine\math\Vector3;

class ActivatedFireBallDirection
{
    static function summon(Level $level, Vector3 $center): void {
        for ($i = 0; $i < 360; $i += 45) {
            $x = 1.5 * sin(deg2rad($i));
            $z = 1.5 * cos(deg2rad($i));

            $pos = $center->asVector3()->add($x, 0.3, $z);

            $level->addParticle(new LavaParticle($pos));
        }
    }
}