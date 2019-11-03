<?php

namespace WoolChannel3295\HealthFood;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;

class Main extends PluginBase implements Listener{

    public $tag = "§8[§a§lＨＥＡＬ_ＦＯＯＤ§r§8]";

    public function onEnable(): void{
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    	$this->getLogger()->info("\nPlugin Đã Chạy Rồi Đm Mày\n");
    }

    public function onDisable(): void{
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    	$this->getLogger()->info("\n\nPlugin Đã Tắt\n\n");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
    	switch($cmd->getName()) {
			case "heal":
			if(!($sender instanceof Player)){
				$sender->sendMessage("$this->tag §cVui Lòng Sử Dụng Trong Trò Chơi Nhé");
                return true;
            }
                $this->heal($sender);
            break;
            case "food":
            if(!($sender instanceof Player)){
				$sender->sendMessage("$this->tag §cVui Lòng Sử Dụng Trong Trò Chơi Nhé");
                return true;
			}
			    $this->food($sender);
            break;
        }
        return true;
    }

    public function heal($sender){
        if($sender->hasPermission("heal.command")){
            $sender->setHealth(20);
                $sender->sendMessage("$this->tag §bBạn Đã Được Hồi Máu");
        } else {
                $sender->sendMessage("You do have permission use command");
                return true;
        }
    }

    public function food($sender){
        if($sender->hasPermission("food.command")){
            $sender->setFood(20);
                $sender->sendMessage("$this->tag §bBạn Đã Được Hồi Thức Ăn");
        } else {
                $sender->sendMessage("You do have permission use command");
                return true;
        }
    }
} 