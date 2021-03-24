<?php


namespace gia\pmmp\services;


use gia\models\AttackGia;
use gia\utilities\CalculateDamage;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;

//TODO:Rename invoke→invoker→executor→activateはおかしい
class ActivateAttackGiaPMMPService
{
    /**
     * @param Player $invoker
     * @param Vector3 $activatedPosition
     * @param AttackGia $gia
     * @param Entity[] $targets
     */
    static function execute(Player $invoker, Vector3 $activatedPosition, AttackGia $gia, array $targets): void {

        foreach ($targets as $target) {
            if ($target instanceof Player) {
                $damage = CalculateDamage::execute($invoker->getName(), $target->getName(), $gia::Damage);
            } else {
                $damage = CalculateDamage::execute($invoker->getName(), "", $gia::Damage);
            }

            if ($damage === -1) {
                if ($target instanceof Player) {
                    $target->sendPopup("回避");
                }
                continue;
            }

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