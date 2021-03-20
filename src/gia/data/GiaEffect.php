<?php


namespace gia\data;


//定義でしかない
class GiaEffect
{
    const NAME = "";
    const NAME_JP = "";
    const RELATED_ABILITY_NAME = "";

    private int $value;
    private int $seconds;

    public function __construct(int $value, int $seconds) {
        $this->value = $value;
        $this->seconds = $seconds;
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
}