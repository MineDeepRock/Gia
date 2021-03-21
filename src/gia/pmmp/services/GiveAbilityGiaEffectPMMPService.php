<?php


namespace gia\pmmp\services;


use gia\models\AbilityGiaEffect;
use gia\store\PlayerStatusStore;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class GiveAbilityGiaEffectPMMPService
{
    static function execute(Player $player, AbilityGiaEffect $abilityGiaEffect): void {
        //TODO:音　パーティクルも?
        $player->sendPopup(TextFormat::GREEN . $abilityGiaEffect::NAME_JP . ":{$abilityGiaEffect->getValue()} {$abilityGiaEffect->getSeconds()}秒");

        $status = PlayerStatusStore::findByName($player->getName());
        if ($status === null) return;
        $status->addAbilityGiaEffect($abilityGiaEffect);
    }
}