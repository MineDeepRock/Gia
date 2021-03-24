<?php


namespace gia\models;


class GiaTargetType
{
    private string $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function equals(self $commandType): bool {
        return $this->type == $commandType->type;
    }

    public static function SingleEnemy(): self {
        return new self("SingleEnemy");
    }

    public static function AroundEnemy(): self {
        return new self("AroundEnemy");
    }

    public static function SingleAlly(): self {
        return new self("SingleAlly");
    }

    public static function AroundAlly(): self {
        return new self("AroundAlly");
    }

    public static function MySelf(): self {
        return new self("MySelf");
    }
}