<?php


namespace gia\pmmp\entities;


use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;

class IceBall extends EntityBase
{
    const NAME = "IceBall";

    public string $skinName = self::NAME;
    public string $geometryId = "geometry." . self::NAME;
    public string $geometryName = self::NAME . ".geo.json";

    public $width = 0;
    public $height = 0;
    public $eyeHeight = 1.0;
    protected $gravity = 0;

    private Player $invoker;
    private Entity $target;

    public function __construct(Level $level, CompoundTag $nbt, Player $invoker, Entity $target) {
        $this->invoker = $invoker;
        $this->target = $target;
        parent::__construct($level, $nbt);
    }

    public function entityBaseTick(int $tickDiff = 1): bool {
        if ($this->getPosition()->distance($this->target) <= 0.5) {
            $this->kill();
            ActivateAttackGia::execute($this->invoker, $this->getPosition(), new IceBallGia(), [$this->target]);
        }

        return parent::entityBaseTick($tickDiff);
    }
}