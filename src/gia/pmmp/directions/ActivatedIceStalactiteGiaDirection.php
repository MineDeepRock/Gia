<?php


namespace gia\pmmp\directions;


use pocketmine\block\Ice;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\Player;

class ActivatedIceStalactiteGiaDirection
{
    /**
     * @param Level $level
     * @param Entity $target
     */
    static function summon(Level $level, Entity $target) {
        if ($target instanceof Player) {
            if (!$target->isOnline()) return;
        }

        for ($i = 0; $i < 360; $i += 90) {
            $x = 1.5 * sin(deg2rad($i));
            $z = 1.5 * cos(deg2rad($i));

            $pos = $target->asVector3()->add($x, 0.3, $z);

            $level->addParticle(new DestroyBlockParticle($pos, new Ice()));
        }
    }
}