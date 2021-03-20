<?php

namespace gia\models;


class PlayerRank
{
    private int $rank;
    private int $totalExp;
    private int $xpToNextRank;

    public function __construct(int $rank, int $totalExp, int $xpToNextRank) {
        $this->rank = $rank;
        $this->totalExp = $totalExp;
        $this->xpToNextRank = $xpToNextRank;
    }

    static function asNew(): self {
        return new self(1, 0, 300);
    }

    /**
     * @return int
     */
    public function getRank(): int {
        return $this->rank;
    }

    /**
     * @return int
     */
    public function getTotalExp(): int {
        return $this->totalExp;
    }

    /**
     * @return int
     */
    public function getXpToNextRank(): int {
        return $this->xpToNextRank;
    }
}