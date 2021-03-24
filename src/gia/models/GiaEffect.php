<?php


namespace gia\models;


//定義でしかない
class GiaEffect
{
    const NAME = "";
    const NAME_JP = "";
    const RELATED_ABILITY_NAME = "";

    private GiaEffectTargetType $targetType;
    private float $range;

    private int $value;
    private int $seconds;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $giaEffectTargetType, float $range = 0) {
        $this->value = $value;
        $this->seconds = $seconds;
        $this->targetType = $giaEffectTargetType;
        $this->range = $range;
    }

    /**
     * @return int
     */
    public function getValue(): int {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getSeconds(): int {
        return $this->seconds;
    }

    /**
     * @return GiaEffectTargetType
     */
    public function getTargetType(): GiaEffectTargetType {
        return $this->targetType;
    }

    /**
     * @return float|int
     */
    public function getRange() {
        return $this->range;
    }
}