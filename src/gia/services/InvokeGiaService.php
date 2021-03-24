<?php

namespace gia\services;


use gia\models\Gia;
use gia\store\PlayerStatusStore;

class InvokeGiaService
{
    static function execute(string $invokerName, Gia $gia): bool {
        $status = PlayerStatusStore::findByName($invokerName);
        if ($status === null) return false;

        $result = $status->getEnergy()->spend($gia->getSpendEnergyAmount());
        if (!$result) return false;

        return true;
    }
}