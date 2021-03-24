<?php


namespace gia;


use gia\aggregates\PlayerStatus;
use gia\events\UpdatedPlayerStatusEvent;
use gia\models\attack_gia\IceBallGia;
use gia\pmmp\entities\InvincibleEntity;
use gia\pmmp\scoreboards\PlayerStatusScoreboard;
use gia\pmmp\services\InvokeAttackGiaPMMPService;
use gia\pmmp\services\InvokeIceBallPMMPService;
use gia\pmmp\services\UpdatePlayerSpeedPMMPService;
use gia\store\PlayerStatusStore;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\EntityDamageEvent;
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

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        PlayerStatusStore::add(new PlayerStatus($player->getName(), $this->getScheduler()));
        PlayerStatusScoreboard::send($player);
    }

    public function onUpdatedPlayerStatus(UpdatedPlayerStatusEvent $event) {
        $player = Server::getInstance()->getPlayer($event->getPlayerName());
        if ($player === null) return;
        if (!$player->isOnline()) return;

        $playerStatus = PlayerStatusStore::findByName($player->getName());
        PlayerStatusScoreboard::update($player);
        UpdatePlayerSpeedPMMPService::execute($player, $playerStatus->getMovingVelocity()->getAsRate());
    }

    public function onDamagedInvincibleEntity(EntityDamageEvent $event) {
        if ($event->getEntity() instanceof InvincibleEntity) {
            $event->setCancelled();
        }
    }


    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!($sender instanceof Player)) return false;
        if ($label === "iceball") {
            InvokeAttackGiaPMMPService::execute($sender, new IceBallGia(), $this->getScheduler());
        }
        return false;
    }
}