<?php

namespace app\admin\controller;

use app\admin\model\servicemain;
use system;

class main extends system\Controller {

    public function __construct() {
        parent::__construct();
        $this->servicemain = new servicemain();
    }

    protected function index() {
        $data['title'] = '<!-- Index -->';
        $this->showView('index', $data, 'theme_admin');
    }
    
    protected function header() {
        $data['title'] = '<!-- Header -->';
        $this->subView('header', $data);
    }
    
    protected function menu() {
        $data['title'] = '<!-- Menu -->';
        $this->subView('menu', $data);
    }
    
    protected function footer() {
        $data['title'] = '<!-- Footer -->';
        $this->subView('footer', $data);
    }
    
    public function script() {
        $data['title'] = '<!-- Script -->';
        $this->subView('script', $data);
    }

}

?>
