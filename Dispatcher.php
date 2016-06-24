<?php
class Dispatcher {
    private $sysRoot;
    //URLの階層設定。どの階層からをパラメータとして解釈するか。
    // /直下に置くなら0, /test/以下に置くなら1, /test/hoge/以下に置くなら2
    private $paramLevel=1;

    public function setSystemRoot($path) {
        $this->sysRoot = rtrim($path, '/');
    }

    /**
     * URLの階層設定。どの階層からをパラメータとして解釈するか。
     * @param int $iLevel
     */
    public function setPramLevel($iLevel) {
        $this->paramLevel = $iLevel;
    }

    public function dispatch() {
        $params_tmp = array();
        //?で分割。GETパラータを無視するため
        $params_tmp = explode('?', $_SERVER['REQUEST_URI']);
        // パラメーター取得（末尾,先頭の / は削除）
        $params_tmp[0] = ereg_replace('/?$', '', $params_tmp[0]);
        $params_tmp[0] = ereg_replace('^/*', '', $params_tmp[0]);
        $params = array();
        if ('' != $params_tmp[0]) {
            // パラメーターを / で分割
            $params = explode('/', $params_tmp[0]);
        }
        // １番目のパラメーターをコントローラーとして取得
        $controller = "index";
        if ($this->paramLevel < count($params)) {
            $controller = $params[$this->paramLevel];
        }

        // パラメータより取得したコントローラー名によりクラス振分け
        $className = ucfirst(strtolower($controller)) . 'Controller';
        // クラスファイル読込
        require_once $this->sysRoot . '/controllers/' . $className . '.php';
        $url = "/";
        for ($i = 0; $i < $this->paramLevel; $i++) {
            $url = $url . $params[$i] . "/";
        }

        // クラスインスタンス生成
        $controllerInstance = new $className($url);

        // 2番目のパラメーターをアクションとして取得
        $action= 'index';
        if ( ($this->paramLevel + 1) < count($params)) {
            $action= $params[($this->paramLevel + 1)];
        }

        // アクションメソッドを実行
        $actionMethod = $action . 'Action';
        $controllerInstance->$actionMethod();      
    }
}
?>
