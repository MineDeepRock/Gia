<?php

namespace gia\aggregates;


use gia\models\GiaEffect;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\AttackPower;
use gia\models\player_abilities\DefensivePower;
use gia\models\player_abilities\EvadeRate;
use gia\models\player_abilities\HitRate;
use gia\models\player_abilities\MovingVelocity;
use gia\models\player_abilities\RecoveryRate;
use gia\models\PlayerAbility;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskScheduler;

class PlayerStatus
{
    private TaskScheduler $scheduler;

    private string $name;

    //外からは触らせない
    private AttackPower $attackPower;
    private DefensivePower $defensivePower;
    private EvadeRate $evadeRate;
    private HitRate $hitRate;
    private MovingVelocity $movingVelocity;
    private RecoveryRate $recoveryRate;

    /**
     * @var GiaEffect[]
     */
    private array $giaEffects = [];

    public function __construct(string $name) {
        $this->name = $name;

        $this->attackPower = new AttackPower();
        $this->defensivePower = new DefensivePower();
        $this->evadeRate = new EvadeRate();
        $this->hitRate = new HitRate();
        $this->movingVelocity = new MovingVelocity();
        $this->recoveryRate = new RecoveryRate();

    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    public function findGiaEffectByName(string $name): array {
        $giaEffects = [];
        foreach ($this->giaEffects as $giaEffect) {
            if ($giaEffect::NAME === $name) {
                $giaEffects[] = $giaEffect;
            }
        }

        return $giaEffects;
    }

    public function addGiaEffectRelatedWithAbility(GiaEffectRelatedWithAbility $giaEffect) {
        $giaEffect->act($this->getAbilityFromName($giaEffect::RELATED_ABILITY_NAME));

        $this->scheduler->scheduleDelayedTask(new ClosureTask(function (int $tick) use ($giaEffect) {
            $giaEffect->reverse($this->getAbilityFromName($giaEffect::RELATED_ABILITY_NAME));
        }), 20 * $giaEffect->getSeconds());

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
}