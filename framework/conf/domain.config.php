<?php
/**
 * 网站所有的域名访问 controller 层 目录的指定
 * 
 */

//网站主域名
define('DOMAIN', 'football.com');
//网站访问地址
define('HOME_URL', 'http://www.'.DOMAIN.'/');

$domainArray = array(
    'www.football.com' => array(
        'controller' => 'mgr',
        'outputFormat' => 'html',
        'version' => ''
    ),
);

