<?php


namespace gia;


class DataFolderPath
{
    static string $playerData;
    static string $skin;
    static string $geometry;
    static string $playerSkin;

    static function init(string $dataPath, string $resourcePath) {
        self::$playerData = $dataPath . "player_data/";
        if (!file_exists(self::$playerData)) mkdir(self::$playerData);

        self::$skin = $resourcePath . "skin/";
        if (!file_exists(self::$skin)) mkdir(self::$skin);

        self::$geometry = $resourcePath . "geometry/";
        if (!file_exists(self::$geometry)) mkdir(self::$geometry);


        self::$playerSkin = $dataPath . "player_skin/";
        if (!file_exists(self::$playerSkin)) mkdir(self::$playerSkin);
    }
}