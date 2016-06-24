<?php
function IncludePathSetting($dispatcher){
        $path = '/var/www/Neco/smarty/libs/';
        //$path .= PATH_SEPARATOR . '/vagrant/smarty/libs/ とは別にインクルードするディレクトリあれば指定/';
        $dispatcher->setSystemRoot('/var/www/Neco/test/');       
        set_include_path(get_include_path() . PATH_SEPARATOR . $path);
}
?>
