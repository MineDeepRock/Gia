<?php


namespace gia\pmmp\entities;


use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

abstract class GiaGrainEntity extends EntityBase implements InvincibleEntity
{
    const NAME = "";

    public $width = 0;
    public $height = 0;
    public $eyeHeight = 1.0;
    protected $gravity = 0;

    private float $speed = 1.5;


    protected TaskScheduler $scheduler;
    protected Player $invoker;
    protected Entity $target;

    public function __construct(Level $level, CompoundTag $nbt, Player $invoker, Entity $target, TaskScheduler $scheduler) {
        $this->scheduler = $scheduler;
        $this->invoker = $invoker;
        $this->target = $target;

        $this->skinName = static::NAME;
        $this->geometryId = "geometry." . static::NAME;
        $this->geometryName = static::NAME . ".geo.json";

        parent::__construct($level, $nbt);
    }

    public function entityBaseTick(int $tickDiff = 1): bool {
        if (!$this->target->isAlive()) {
            $this->kill();
            return parent::entityBaseTick($tickDiff);
        }
        if ($this->isImmobile()) return parent::entityBaseTick($tickDiff);

        if ($this->target instanceof Player) {
            if (!$this->target->isOnline()) {
                $this->kill();
                return parent::entityBaseTick($tickDiff);
            }
        }

        $this->lookAt($this->target->asVector3()->add(0, 1));
        $direction = $this->getDirectionVector();

        $distance = $this->target->asVector3()->add(0, 1)->distance($this);

        $this->motion->x = $direction->getX() * $this->speed;
        $this->motion->y = $direction->getY() * $this->speed;
        $this->motion->z = $direction->getZ() * $this->speed;

        if ($distance <= 1) {
            $this->onActive();
        }

        return parent::entityBaseTick($tickDiff);
    }

    abstract function onActive():void;

    /**
     * @param float $speed
     */
    public function setSpeed(float $speed): void {
        $this->speed = $speed;
    }

    public function kill() : void{
        $this->setHealth(0);
        $this->scheduleUpdate();
    }
}