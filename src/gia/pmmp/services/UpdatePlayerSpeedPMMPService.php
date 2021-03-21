<?php


namespace gia\pmmp\services;


use pocketmine\entity\Attribute;
use pocketmine\Player;

class UpdatePlayerSpeedPMMPService
{
    static function execute(Player $player, float $value): void {
        $player->getAttributeMap()->getAttribute(Attribute::MOVEMENT_SPEED)->setValue($value);
    }
}