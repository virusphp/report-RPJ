<?php

namespace app\admin\model;

use app\admin\model\dbmain;
use system;
use comp;

class servicemain extends system\Model {

    public function __construct() {
        parent::__construct();
        parent::setConnection('dbmain');
        $this->dbmain = new dbmain();
    }

}

?>
