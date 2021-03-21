<?php


namespace gia\models;


class AbilityGiaEffectCommandType
{
    private string $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function equals(self $commandType): bool {
        return $this->type == $commandType->type;
    }

    public static function Up(): self {
        return new self("Up");
    }

    public static function Down(): self {
        return new self("Down");
    }
}