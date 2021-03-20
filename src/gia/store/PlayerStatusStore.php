<?php

namespace gia\store;


use gia\aggregates\PlayerStatus;

class PlayerStatusStore
{
    static array $playerStatusList = [];

    static function add(PlayerStatus $playerStatus): bool {
        if (self::findByName($playerStatus->getName()) !== null) return false;

        self::$playerStatusList[] = $playerStatus;
        return true;
    }

    static function delete(string $name): void {

        foreach (self::$playerStatusList as $key => $playerStatus) {
            if ($playerStatus->getName() === $name) {
                self::$playerStatusList[$key]->stopTransformTimer();
                unset(self::$playerStatusList[$key]);
            }
        }

        self::$playerStatusList = array_values(self::$playerStatusList);
    }

    static function findByName(string $name): ?PlayerStatus {
        if ($name === null) return null;

        foreach (self::$playerStatusList as $playerStatus) {
            if ($playerStatus->getName() === $name) {
                return $playerStatus;
            }
        }

        return null;
    }

    static function update(PlayerStatus $playerStatus) {
        self::delete($playerStatus->getName());
        self::add($playerStatus);
    }

}