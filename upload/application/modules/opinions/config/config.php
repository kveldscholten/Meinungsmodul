<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Config;

class Config extends \Ilch\Config\Install
{
    public $config = array
    (
        'key' => 'opinions',
        'author' => 'Veldscholten, Kevin',
        'icon_small' => 'opinions.png',
        'languages' => array
        (
            'de_DE' => array
            (
                'name' => 'Meinungen',
                'description' => 'Hier können die Meinungen der Seite verwaltet werden.',
            ),
            'en_EN' => array
            (
                'name' => 'Opinions',
                'description' => 'Here you can manage opinions from your Site.',
            ),
        )
    );

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
        $databaseConfig->set('opinions_box_count', '3');
        $databaseConfig->set('opinions_slider_interval', '5000');
    }

    public function uninstall()
    {
        $this->db()->queryMulti('DROP TABLE `[prefix]_opinions`');
        $this->db()->queryMulti("DELETE FROM `[prefix]_config` WHERE `key` = 'opinions_box_count'");
        $this->db()->queryMulti("DELETE FROM `[prefix]_config` WHERE `key` = 'opinions_slider_interval'");
    }

    public function getInstallSql()
    {
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_opinions` (
                  `id` INT(11) NOT NULL AUTO_INCREMENT,
                  `user_id` INT(11) NOT NULL,
                  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `text` MEDIUMTEXT NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;';
    }
}
