<?php

namespace gia\aggregates;


use gia\events\UpdatedPlayerStatusEvent;
use gia\models\Energy;
use gia\models\AbilityGiaEffect;
use gia\models\Gia;
use gia\models\player_abilities\AttackPower;
use gia\models\player_abilities\DefensivePower;
use gia\models\player_abilities\EvadeRate;
use gia\models\player_abilities\HitRate;
use gia\models\player_abilities\MovingVelocity;
use gia\models\player_abilities\RecoveryRate;
use gia\models\PlayerAbility;
use gia\models\TeamId;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskHandler;
use pocketmine\scheduler\TaskScheduler;

class PlayerStatus
{

    /**
     * @var TaskHandler[]
     */
    private array $handlers = [];
    private TaskScheduler $scheduler;

    private string $name;
    private ?TeamId $teamId;

    //外から操作をしない,getterはしかたなく置く
    private Energy $energy;
    private AttackPower $attackPower;
    private DefensivePower $defensivePower;
    private EvadeRate $evadeRate;
    private HitRate $hitRate;
    private MovingVelocity $movingVelocity;
    private RecoveryRate $recoveryRate;

    public function __construct(string $name, TaskScheduler $scheduler) {
        $this->name = $name;
        $this->scheduler = $scheduler;

        $this->energy = new Energy($name, $scheduler);
        $this->attackPower = new AttackPower();
        $this->defensivePower = new DefensivePower();
        $this->evadeRate = new EvadeRate();
        $this->hitRate = new HitRate();
        $this->movingVelocity = new MovingVelocity();
        $this->recoveryRate = new RecoveryRate();
        $this->teamId = null;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    public function addAbilityGiaEffect(AbilityGiaEffect $giaEffect) {
        $giaEffect->act($this->getAbilityFromName($giaEffect::RELATED_ABILITY_NAME));
        $event = new UpdatedPlayerStatusEvent($this->name);
        $event->call();

        $handler = $this->scheduler->scheduleDelayedTask(new ClosureTask(function (int $tick) use ($giaEffect) : void {
            $giaEffect->reverse($this->getAbilityFromName($giaEffect::RELATED_ABILITY_NAME));
            $event = new UpdatedPlayerStatusEvent($this->name);
            $event->call();
        }), 20 * $giaEffect->getSeconds());
        $this->handlers[] = $handler;
    }

    private function getAbilityFromName(string $name): ?PlayerAbility {
        switch ($name) {
            case AttackPower::NAME:
                return $this->attackPower;
            case DefensivePower::NAME:
                return $this->defensivePower;
            case EvadeRate::NAME:
                return $this->evadeRate;
            case HitRate::NAME:
                return $this->hitRate;
            case MovingVelocity::NAME:
                return $this->movingVelocity;
            case RecoveryRate::NAME:
                return $this->recoveryRate;
            default:
                return null;
        }
    }

    public function canActiveGia(Gia $gia): bool {
        return $this->energy->getValue() >= $gia->getSpendEnergyAmount();
    }


    public function activeGia(Gia $gia): bool {
        return $this->energy->spend($gia->getSpendEnergyAmount());
    }

    /**
     * @return AttackPower
     */
    public function getAttackPower(): AttackPower {
        return $this->attackPower;
    }

    /**
     * @return DefensivePower
     */
    public function getDefensivePower(): DefensivePower {
        return $this->defensivePower;
    }

    /**
     * @return EvadeRate
     */
    public function getEvadeRate(): EvadeRate {
        return $this->evadeRate;
    }

    /**
     * @return HitRate
     */
    public function getHitRate(): HitRate {
        return $this->hitRate;
    }

    /**
     * @return MovingVelocity
     */
    public function getMovingVelocity(): MovingVelocity {
        return $this->movingVelocity;
    }

    /**
     * @return RecoveryRate
     */
    public function getRecoveryRate(): RecoveryRate {
        return $this->recoveryRate;
    }

    public function close(): void {
        foreach ($this->handlers as $handler) {
            $handler->cancel();
            $this->energy->close();
        }
    }

    /**
     * @return Energy
     */
    public function getEnergy(): Energy {
        return $this->energy;
    }

    /**
     * @param TeamId|null $teamId
     */
    public function setTeamId(?TeamId $teamId): void {
        $this->teamId = $teamId;
    }

    /**
     * @return TeamId|null
     */
    public function getTeamId(): ?TeamId {
        return $this->teamId;
    }
}