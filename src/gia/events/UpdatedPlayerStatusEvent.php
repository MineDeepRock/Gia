<?php


namespace gia\events;


use pocketmine\event\Event;

class UpdatedPlayerStatusEvent extends Event
{
    private string $playerName;
    public function __construct(string $playerName) {
        $this->playerName = $playerName;
    }

    public function getPlayerName(): string {
        return $this->playerName;
    }
}