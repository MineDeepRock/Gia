<?php


namespace gia;


use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable() {
        DataFolderPath::init($this->getDataFolder(),  $this->getFile() . "resources/");
    }

}