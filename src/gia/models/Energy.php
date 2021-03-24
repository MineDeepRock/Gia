<?php


namespace gia\models;


use gia\events\UpdatedPlayerStatusEvent;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskHandler;
use pocketmine\scheduler\TaskScheduler;

class Energy
{
    private string $ownerName;

    private int $value;
    private int $initialMaxValue;
    private int $maxValue;

    private int $changedAmount;
    private float $coolTime;

    private TaskScheduler $scheduler;
    private ?TaskHandler $rechargeHandler;

    public function __construct(string $ownerName, TaskScheduler $taskScheduler, int $initialMaxValue = 10) {
        $this->ownerName = $ownerName;
        $this->scheduler = $taskScheduler;
        $this->rechargeHandler = null;

        $this->value = $initialMaxValue;
        $this->initialMaxValue = $initialMaxValue;
        $this->maxValue = $initialMaxValue;
        $this->changedAmount = 0;
        $this->coolTime = 1.5;
    }

    private function startRecharge(): void {
        $this->rechargeHandler = $this->scheduler->scheduleDelayedRepeatingTask(new ClosureTask(function (int $tick): void {
            $this->value++;
            if ($this->value >= $this->maxValue) {
                $this->value = $this->maxValue;
                $this->rechargeHandler->cancel();
            }

            $event = new UpdatedPlayerStatusEvent($this->ownerName);
            $event->call();
        }), 20 * $this->coolTime, 20 * $this->coolTime);
    }

    public function spend(int $amount): bool {
        $amount = abs($amount);
        if ($amount > $this->value) return false;


        $this->value -= $amount;
        $event = new UpdatedPlayerStatusEvent($this->ownerName);
        $event->call();

        if ($amount === 0) return true;
        if ($this->rechargeHandler === null) {
            $this->startRecharge();
        } else if ($this->rechargeHandler->isCancelled()) {
            $this->startRecharge();
        }

        return true;
    }

    public function close(): void {
        $this->rechargeHandler->cancel();
    }

    /**
     * @return int
     */
    public function getValue(): int {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getInitialMaxValue(): int {
        return $this->initialMaxValue;
    }

    /**
     * @return int
     */
    public function getMaxValue(): int {
        return $this->maxValue;
    }

    /**
     * @return int
     */
    public function getChangedAmount(): int {
        return $this->changedAmount;
    }

    /**
     * @return float
     */
    public function getCoolTime(): float {
        return $this->coolTime;
    }
}