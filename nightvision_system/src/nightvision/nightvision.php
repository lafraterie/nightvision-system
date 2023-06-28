<?php

namespace nightvision;


use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Nightvision extends Command{

    public function __construct()
    {
        parent::__construct("nightvision","Donne un effet de vision nocturne","/nightvision",["nv"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if ($sender->hasPermission("nv.cmd") or Server::getInstance()->isOp($sender->getName())) {
                if ($sender->getEffects()->has(VanillaEffects::NIGHT_VISION())){
                    $sender->getEffects()->remove(VanillaEffects::NIGHT_VISION());
                    $sender->sendPopup("§l§c Vous avez perdu votre effet de vision nocturne...");
                }else{
                    $effect = new EffectInstance(VanillaEffects::NIGHT_VISION(), 20*5000,0,false); // Temps modifiable ici
                    $sender->getEffects()->add($effect);
                    $sender->sendPopup("§l§c Vous avez activé un effet de vision nocture!");

                }
            }
        }
    }
}
