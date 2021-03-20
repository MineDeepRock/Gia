<?php

namespace gia\dto;


use gia\data\PlayerData;

class PlayerDataDTO
{
    static function encode(PlayerData $playerData): array {
        return [
            "name" => $playerData->getName(),
            "money" => $playerData->getMoney(),
            "rank" => PlayerRankDTO::encode($playerData->getPlayerRank())
        ];
    }

    static function decode(array $json): PlayerData {
        return new PlayerData($json["name"], $json["money"], PlayerRankDTO::decode($json["rank"]));
    }
}