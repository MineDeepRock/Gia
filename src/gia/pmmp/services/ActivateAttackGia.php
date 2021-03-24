<?php


namespace gia\pmmp\services;


use gia\models\AttackGia;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;

class ActivateAttackGia
{
    /**
     * @param Player $invoker
     * @param Vector3 $activatedPosition
     * @param AttackGia $gia
     * @param Entity[] $targets
     */
    static function execute(Player $invoker, Vector3 $activatedPosition, AttackGia $gia, array $targets): void {
        $damage = $gia::Damage;

        foreach ($targets as $target) {
            $source = new EntityDamageByEntityEvent($invoker, $target, EntityDamageEvent::CAUSE_CONTACT, $damage, [], 0);
            $source->call();
            $target->setLastDamageCause($source);

            $target->setHealth($target->getHealth() - $damage);
        }

        foreach ($gia->getGiaEffects() as $giaEffect) {
            ExecuteGiaEffectPMMPService::execute($invoker, $activatedPosition, $giaEffect);
        }
    }
}