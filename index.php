<?php
ini_set('display_errors', 1);

require_once 'Dispatcher.php';
require_once 'util.php';

$dispatcher = new Dispatcher();
IncludePathSetting($dispatcher);

//apacheのドキュメントルートから何階層目のディレクトリにMVCアプリを配備するか。
$dispatcher->setPramLevel(0);
$dispatcher->dispatch();

?>

