<?php

namespace nightvision;
use pocketmine\plugin\PluginBase;
use nightvision\nightvision;


class Main extends PluginBase {

    private static Main $instace;

    public static function getInstance(): Main
    {
        return self::$instace;
    }

    public function onEnable(): void
    {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();


        self::$instace = $this;


        $this->getLogger()->notice("Allumé avec succès!");



        $this->getServer()->getCommandMap()->register("nightvision", new nightvision());
    





        $this->saveResource("config.yml");



}
}

