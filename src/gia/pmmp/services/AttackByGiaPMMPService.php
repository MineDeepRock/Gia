<?php


namespace gia\pmmp\services;


use gia\models\AttackGia;
use gia\utilities\CalculateDamage;
use gia\utilities\CalculateHitRate;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\Player;

//TODO:Rename invoke→invoker→executor→activateはおかしい
class AttackByGiaPMMPService
{
    /**
     * @param Player $invoker
     * @param AttackGia $gia
     * @param Entity $target
     */
    static function execute(AttackGia $gia, Player $invoker, Entity $target): void {
        if ($target instanceof Player) {
            $hitRate = CalculateHitRate::execute($invoker->getName(), $target->getName(), $gia::HitRate);
            $damage = CalculateDamage::execute($invoker->getName(), $target->getName(), $gia::Damage);
        } else {
            $hitRate = CalculateHitRate::execute($invoker->getName(), "", $gia::HitRate);
            $damage = CalculateDamage::execute($invoker->getName(), "", $gia::Damage);
        }

        var_dump($hitRate);
        var_dump($damage);

        if (random_int(1, 100) >= $hitRate * 100) {
            if ($target instanceof Player) {
                $target->sendPopup("回避");
            }
            return;
        }

        $source = new EntityDamageByEntityEvent($invoker, $target, EntityDamageEvent::CAUSE_CONTACT, $damage, [], 0.1);
        $source->call();
        $target->setLastDamageCause($source);

        $target->setHealth($target->getHealth() - $damage);
    }
}