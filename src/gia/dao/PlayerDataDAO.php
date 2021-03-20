<?php

namespace gia\dao;


use gia\data\PlayerData;
use gia\DataFolderPath;
use gia\dto\PlayerDataDTO;

class PlayerDataDAO
{
    static function add(PlayerData $playerData) {
        if (self::findByName($playerData->getName()) !== null) return;

        file_put_contents(DataFolderPath::$playerData . $playerData->getName() . ".json", json_encode(PlayerDataDTO::encode($playerData)));
    }

    static function getAll() {
        $playerDataList = [];
        $dh = opendir(DataFolderPath::$playerData);
        while (($fileName = readdir($dh)) !== false) {
            if (filetype(DataFolderPath::$playerData . $fileName) === "file") {
                $data = json_decode(file_get_contents(DataFolderPath::$playerData . $fileName), true);
                $playerDataList[] = PlayerDataDTO::decode($data);
            }
        }

        closedir($dh);

        return $playerDataList;
    }

    static function findByName(string $name) {
        if (!file_exists(DataFolderPath::$playerData . $name . ".json")) return null;

        $playerData = json_decode(file_get_contents(DataFolderPath::$playerData . $name . ".json"), true);
        return PlayerDataDTO::decode($playerData);
    }

    static function update(PlayerData $playerData): void {
        if (self::findByName($playerData->getName()) === null) return;

        file_put_contents(DataFolderPath::$playerData . $playerData->getName() . ".json", json_encode(PlayerDataDTO::encode($playerData)));
    }
}