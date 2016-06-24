<?php

/**
 * smarty_test.php
*/

// Smartyパス設定
define('SMARTY_PATH', '/var/www/Neco/smarty/');
define('SMARTY_TEMPLATES_DIR', SMARTY_PATH . 'templates/');
define('SMARTY_COMPIlE_DIR', SMARTY_PATH . 'templates_c/');
define('SMARTY_CACHE_DIR', SMARTY_PATH . 'chache/');

// インスタンス生成
require_once(SMARTY_PATH . 'libs/Smarty.class.php');
$objSmarty = new Smarty();

// ディレクトリの指定
$objSmarty->template_dir = SMARTY_TEMPLATES_DIR;
$objSmarty->compile_dir = SMARTY_COMPIlE_DIR;
$objSmarty->cache_dir = SMARTY_CACHE_DIR;

// テンプレート変数の設定
$objSmarty->assign('message', 'ひなにゃす!!');

// テンプレート出力
$objSmarty->display('smarty_test.tpl');
?>
