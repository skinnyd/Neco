<?php
require_once( 'test/model/KoharuModel.php' );
require_once('Smarty.class.php');

class KoharuController {
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
        $this->model = new KoharuModel();
        //ビューインスタンス化
        $this->view = new Smarty();
        //Smartyのディレクトリ設定(キャッシュやテンプレート置き場など)
        $this->view->template_dir = "test/view/templates";
        $this->view->compile_dir = "test/view/templates_c";
        $this->view->cache_dir ="test/view/cache";
        // debugging
        // $this->view->debugging = true;
        //Smartyテンプレートにセットするパス
        $this->url = $url;
        //HTMLから参照すべき外部ファイルのパス設定(URLを/区切りにするとパスが変わるため)
        $this->view->assign("url",$this->url);
    }

    public function showAction() {
        $this->view->display('koharu.tpl');
    }
}
?>
