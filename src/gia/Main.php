<?php


namespace gia;


use gia\aggregates\PlayerStatus;
use gia\events\UpdatedPlayerStatusEvent;
use gia\models\gia_effects\AttackPowerDown;
use gia\models\gia_effects\AttackPowerUp;
use gia\models\gia_effects\DefensivePowerDown;
use gia\models\gia_effects\DefensivePowerUp;
use gia\models\gia_effects\EvadeRateDown;
use gia\models\gia_effects\EvadeRateUp;
use gia\models\gia_effects\HitRateDown;
use gia\models\gia_effects\HitRateUp;
use gia\models\gia_effects\MovingVelocityDown;
use gia\models\gia_effects\MovingVelocityUp;
use gia\models\gia_effects\RecoveryRateDown;
use gia\models\gia_effects\RecoveryRateUp;
use gia\pmmp\scoreboards\PlayerStatusScoreboard;
use gia\pmmp\services\UpdatePlayerSpeedPMMPService;
use gia\store\PlayerStatusStore;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener
{
    public function onEnable() {
        DataFolderPath::init($this->getDataFolder(), $this->getFile() . "resources/");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        PlayerStatusStore::add(new PlayerStatus($player->getName(), $this->getScheduler()));
        PlayerStatusScoreboard::send($player);
    }

    function onUpdatedPlayerStatus(UpdatedPlayerStatusEvent $event) {
        $player = Server::getInstance()->getPlayer($event->getPlayerName());
        if ($player === null) return;
        if (!$player->isOnline()) return;

        $playerStatus = PlayerStatusStore::findByName($player->getName());
        PlayerStatusScoreboard::update($player);
        UpdatePlayerSpeedPMMPService::execute($player, $playerStatus->getMovingVelocity()->getAsRate());
    }


    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!($sender instanceof Player)) return false;

        if ($label === "giaeffect") {
            $effectName = $args[0];
            $status = PlayerStatusStore::findByName($sender->getNameTag());

            switch ($effectName) {
                case AttackPowerUp::NAME:
                    $effect = new AttackPowerUp(2, 10);
                    break;
                case AttackPowerDown::NAME:
                    $effect = new AttackPowerDown(2, 10);
                    break;
                case DefensivePowerUp::NAME:
                    $effect = new DefensivePowerUp(2, 10);
                    break;
                case DefensivePowerDown::NAME:
                    $effect = new DefensivePowerDown(2, 10);
                    break;
                case EvadeRateUp::NAME:
                    $effect = new EvadeRateUp(2, 10);
                    break;
                case EvadeRateDown::NAME:
                    $effect = new EvadeRateDown(2, 10);
                    break;
                case HitRateUp::NAME:
                    $effect = new HitRateUp(2, 10);
                    break;
                case HitRateDown::NAME:
                    $effect = new HitRateDown(2, 10);
                    break;
                case MovingVelocityUp::NAME:
                    $effect = new MovingVelocityUp(2, 10);
                    break;
                case MovingVelocityDown::NAME:
                    $effect = new MovingVelocityDown(2, 10);
                    break;
                case RecoveryRateUp::NAME:
                    $effect = new RecoveryRateUp(2, 10);
                    break;
                case RecoveryRateDown::NAME:
                    $effect = new RecoveryRateDown(2, 10);
                    break;
                default:
                    return false;
            }

            $status->addAbilityGiaEffect($effect);
            return true;
        }


        return false;
    }

}