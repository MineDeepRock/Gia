<?php


namespace gia\pmmp\utilities;


use gia\models\TeamId;
use gia\store\PlayerStatusStore;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\Player;

class EntityFinder
{
    static function getAroundAllies(TeamId $teamId, Level $level, Vector3 $vector3, float $distance): array {
        $result = [];
        foreach (self::getAroundPlayers($level, $vector3, $distance) as $player) {
            $status = PlayerStatusStore::findByName($player->getName());
            $playerTeamId = $status === null ? null : $status->getTeamId();
            if ($playerTeamId->equals($teamId)) $result[] = $player;
        }

        return $result;
    }

    static function getAroundEnemies(TeamId $teamId, Level $level, Vector3 $vector3, float $distance): array {
        $result = [];
        foreach (self::getAroundPlayers($level, $vector3, $distance) as $player) {
            $status = PlayerStatusStore::findByName($player->getName());
            $playerTeamId = $status === null ? null : $status->getTeamId();
            if (!$playerTeamId->equals($teamId)) $result[] = $player;
        }

        return $result;
    }

    static function getClosestAlly(Player $invoker, TeamId $teamId, Level $level, Vector3 $vector3): ?Player {
        $result = null;
        $distance = null;
        foreach ($level->getPlayers() as $player) {
            if ($player->getName() === $invoker) continue;
            $playerStatus = PlayerStatusStore::findByName($player->getName());
            if ($playerStatus === null) continue;
            if ($playerStatus->getTeamId() === null) continue;
            if (!$playerStatus->getTeamId()->equals($teamId)) continue;

            if ($distance === null) {
                $result = $player;
            } else if ($player->distance($vector3) < $distance) {
                $result = $player;
            }
        }

        return $result;
    }

    static function getClosestEnemy(TeamId $teamId, Level $level, Vector3 $vector3): ?Player {
        $result = null;
        $distance = null;
        foreach ($level->getPlayers() as $player) {
            $playerStatus = PlayerStatusStore::findByName($player->getName());
            if ($playerStatus === null) continue;
            if ($playerStatus->getTeamId() === null) continue;
            if ($playerStatus->getTeamId()->equals($teamId)) continue;

            if ($distance === null) {
                $result = $player;
            } else if ($player->distance($vector3) < $distance) {
                $result = $player;
            }
        }

        return $result;
    }

    static function getClosestEntity(Level $level, Vector3 $vector3): ?Entity {
        $result = null;
        $distance = null;
        foreach ($level->getEntities() as $entity) {
            if ($entity instanceof Player) continue;
            if ($distance === null) {
                $result = $entity;
            } else if ($entity->distance($vector3) < $distance) {
                $result = $entity;
            }
        }

        return $result;
    }


    static private function getClosestPlayer(Level $level, Vector3 $vector3): ?Player {
        $result = null;
        $distance = null;
        foreach ($level->getPlayers() as $player) {
            if ($distance === null) {
                $result = $player;
            } else if ($player->distance($vector3) < $distance) {
                $result = $player;
            }
        }

        return $result;
    }

    static private function getAroundEntities(Level $level, Vector3 $vector3, float $distance): array {
        $entities = [];

        foreach ($level->getEntities() as $entity) {
            if ($entity->distance($vector3) <= $distance) $entities[] = $entity;
        }

        return $entities;
    }

    static private function getAroundPlayers(Level $level, Vector3 $vector3, float $distance): array {
        $players = [];

        foreach ($level->getPlayers() as $player) {
            if ($player->distance($vector3) <= $distance) $players[] = $player;
        }

        return $players;
    }
}