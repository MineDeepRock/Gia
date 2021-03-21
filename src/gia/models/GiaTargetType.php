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

    public static function Single(): self {
        return new self("Single");
    }

    public static function Around(): self {
        return new self("Around");
    }
}