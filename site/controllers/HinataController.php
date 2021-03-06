<?php
require_once( 'site/model/HinataModel.php' );
require_once('Smarty.class.php');

class HinataController {
    //リクエスト
    private $request;
    //モデル
    private $model;
    //ビュー(Smartyのインスタンス)
    private $view;
    //ビューで表示するURL
    private $url;

    // コンストラクタ
    public function __construct($url) {
        // リクエスト
        //$this->request = new Request();
        //モデルをインスタンス化(コントローラと1:1のパターン)
        //$this->model = new HinataModel();
        //ビューインスタンス化
        $this->view = new Smarty();
        //Smartyのディレクトリ設定(キャッシュやテンプレート置き場など)
        $this->view->template_dir = "site/view/templates";
        $this->view->compile_dir = "site/view/templates_c";
        $this->view->cache_dir = "site/view/cache";
        // debugging
        // $this->view->debugging = true;
        //Smartyテンプレートにセットするパス
        $this->url = $url;
        //HTMLから参照すべき外部ファイルのパス設定(URLを/区切りにするとパスが変わるため)
        $this->view->assign("url",$this->url);
    }

    public function showAction() {
        $this->model = new Show();
        $this->view->display('hinata.tpl');
    }
}
?>
