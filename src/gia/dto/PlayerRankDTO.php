<?php


namespace gia\dto;


use gia\models\PlayerRank;

class PlayerRankDTO
{
    static function encode(PlayerRank $playerRank): array {
        return [
            "rank" => $playerRank->getRank(),
            "total_xp" => $playerRank->getTotalExp(),
            "xp_to_next_rank" => $playerRank->getXpToNextRank()
        ];
    }

    static function decode(array $json): PlayerRank {
        return new PlayerRank($json["rank"], $json["total_xp"], $json["xp_to_next_rank"]);
    }
}