<?php


namespace gia\pmmp\directions;


use gia\models\attack_gia\IceStalactiteGia;
use pocketmine\block\Ice;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\Player;

class LockOnIceStalactiteGiaDirection
{
    /**
     * @param Level $level
     * @param Entity[] $targets
     */
    static function summon(Level $level, array $targets) {

        foreach ($targets as $target) {
            if ($target instanceof Player) {
                if (!$target->isOnline()) continue;
            }

            for ($i = 0; $i < 360; $i += 90) {
                $x = 1.5 * sin(deg2rad($i));
                $z = 1.5 * cos(deg2rad($i));

                $pos = $target->asVector3()->add($x, 0.3, $z);

                $level->addParticle(new DestroyBlockParticle($pos, new Ice()));
            }
        }
    }
}