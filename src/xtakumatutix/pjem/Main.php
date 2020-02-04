<?php
namespace xtakumatutix\pjem;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    /** @var Config */
    private $config;

	public function onEnable(){
		$this->getLogger()->notice("読み込み完了_ver.1.0.0");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            '送信したいメッセージ' => 'Hello World{br}改行だよ＞＜',
        ));
    }

    public function Onjoin(PlayerJoinEvent $event){
    	$player = $event->getPlayer();
    	$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    	$message =$this->config->get("送信したいメッセージ");
    	$message = str_replace("{br}", "\n", $message);
        $player->sendMessage("$message");
    }
}