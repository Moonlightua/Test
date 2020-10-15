<?php
error_reporting(-1);
include_once 'config.php';
include_once './libs/default.php';
include_once './libs/variables.php';
include './module/'.$_GET['module'].'/'.$_GET['page'].'.php';
include './skins/'.SKIN.'/index.tpl';


