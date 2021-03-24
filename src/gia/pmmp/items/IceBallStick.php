<?php

namespace gia\pmmp\items;


use gia\models\attack_gia\IceBallGia;
use pocketmine\item\Item;

class IceBallStick extends Item
{
    public const ITEM_ID = Item::STICK;
    private IceBallGia $iceBallGia;

    public function __construct() {
        parent::__construct(self::ITEM_ID, 0, "IceBall");
        $this->setCustomName($this->getName());
        $this->iceBallGia = new IceBallGia();
    }
}