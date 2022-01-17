<?php
namespace xtakumatutix\jsm;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    /** @var string */
    private $message;

    public function onEnable() :void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            '送信したいメッセージ' => 'Hello World{br}改行だよ＞＜'
        ]);
        $this->message = str_replace("{br}", "\n", $config->get("送信したいメッセージ"));
    }

    public function onJoin(PlayerJoinEvent $event){
        $event->getPlayer()->sendMessage($this->message);
    }
}
