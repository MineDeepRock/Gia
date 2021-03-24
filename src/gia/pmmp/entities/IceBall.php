<?php


namespace gia\pmmp\entities;


use gia\models\attack_gia\IceBallGia;
use gia\pmmp\directions\ActivatedIceBallDirection;
use gia\pmmp\services\ActivateAttackGia;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;
use pocketmine\scheduler\TaskScheduler;

class IceBall extends EntityBase implements InvincibleEntity
{
    const NAME = "IceBall";

    public string $skinName = self::NAME;
    public string $geometryId = "geometry." . self::NAME;
    public string $geometryName = self::NAME . ".geo.json";

    public $width = 0;
    public $height = 0;
    public $eyeHeight = 1.0;
    protected $gravity = 0;

    private TaskScheduler $scheduler;
    private Player $invoker;
    private Entity $target;

    public function __construct(Level $level, CompoundTag $nbt, Player $invoker, Entity $target, TaskScheduler $scheduler) {
        $this->scheduler = $scheduler;
        $this->invoker = $invoker;
        $this->target = $target;
        parent::__construct($level, $nbt);
    }

    public function entityBaseTick(int $tickDiff = 1): bool {
        $this->lookAt($this->target->asVector3()->add(0, 1));
        $direction = $this->getDirectionVector();

        $distance = $this->target->asVector3()->add(0, -1)->distance($this);
        //TODO : 近づくと加速するように
        $speed = $distance >= 20 ? 1.5 : 2;

        $this->motion->x = $direction->getX() * 1.5;
        $this->motion->y = $direction->getY() * 1.5;
        $this->motion->z = $direction->getZ() * 1.5;

        if ($distance <= 1) {
            ActivatedIceBallDirection::summon($this->getLevel(), $this->getPosition(), $this->scheduler);
            ActivateAttackGia::execute($this->invoker, $this->getPosition(), new IceBallGia(), [$this->target]);
            $this->kill();
        }

        return parent::entityBaseTick($tickDiff);
    }
}