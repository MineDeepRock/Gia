<?php

namespace gia\data;


use gia\models\PlayerRank;

class PlayerData
{
    private string $name;
    private int $money;
    private PlayerRank $rank;

    public function __construct(string $name, int $money, PlayerRank $rank) {
        $this->name = $name;
        $this->money = $money;
        $this->rank = $rank;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMoney(): int {
        return $this->money;
    }

    /**
     * @return PlayerRank
     */
    public function getPlayerRank(): PlayerRank {
        return $this->rank;
    }
}