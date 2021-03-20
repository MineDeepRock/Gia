<?php
namespace gia\aggregates;


class PlayerStatus
{
    private string $name;
    private array $giaEffects;

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}