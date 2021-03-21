<?php


namespace gia\pmmp\scoreboards;


use gia\store\PlayerStatusStore;
use gia\utilities\ConvertAbilityToText;
use gia\utilities\ConvertEnergyToText;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use scoreboard_builder\Score;
use scoreboard_builder\Scoreboard;
use scoreboard_builder\ScoreboardSlot;
use scoreboard_builder\ScoreSortType;

class PlayerStatusScoreboard extends Scoreboard
{

    static function create(Player $player): Scoreboard {
        $status = PlayerStatusStore::findByName($player->getName());

        $scores = [
            new Score(TextFormat::BOLD . TextFormat::YELLOW . "プレイヤー情報:"),
            new Score(TextFormat::BOLD . "> 攻撃:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getAttackPower())),
            new Score(TextFormat::BOLD . "> 防御:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getDefensivePower())),
            new Score(TextFormat::BOLD . "> 回避:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getEvadeRate())),
            new Score(TextFormat::BOLD . "> 命中:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getHitRate())),
            new Score(TextFormat::BOLD . "> 移動:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getMovingVelocity())),
            new Score(TextFormat::BOLD . "> 回復:" . TextFormat::RESET . ConvertAbilityToText::execute($status->getRecoveryRate())),
            new Score(TextFormat::BOLD . "> 燃料:" . TextFormat::RESET . ConvertEnergyToText::execute($status->getEnergy())),
        ];
        return parent::__create(ScoreboardSlot::sideBar(), "Lobby", $scores, ScoreSortType::smallToLarge());
    }

    static function send(Player $player) {
        $scoreboard = self::create($player);
        parent::__send($player, $scoreboard);
    }

    static function update(Player $player) {
        $scoreboard = self::create($player);
        parent::__update($player, $scoreboard);
    }
}