<?php


namespace gia\models;


class GiaEffectTargetType
{
    private string $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function equals(self $giaEffectTargetType): bool {
        return $this->type == $giaEffectTargetType->type;
    }

    public static function MySelf(): self {
        return new self("MySelf");
    }

    public static function Allies(): self {
        return new self("Allies");
    }

    public static function OneEnemy(): self {
        return new self("OneEnemy");
    }

    public static function Enemies(): self {
        return new self("Enemies");
    }
}