<?php

namespace app\user\controller;

use app\user\model\servicemain;
use system;

class main extends system\Controller {

    public function __construct() {
        parent::__construct();
        $this->servicemain = new servicemain();
    }

    protected function index() {
        $data['title'] = '<!-- Index -->';
        $this->showView('index', $data, 'theme_user');
    }
    
    public function laporan() {
        $input = $this->post(true);
        if ($input) {
            $data['sdate'] = date('Y-m-d', strtotime($input['sdate']));
            $data['edate'] = date('Y-m-d', strtotime($input['edate']));
            $data['dataUser'] = $this->pegawai_service->getArrayPersonal($input['pin_absen']);
            $data['dataSatker'] = $this->pegawai_service->getDataSatker($input['kdlokasi']);
            $data['dataApel'] = $this->apelpagi_service->getArrayRecord($input);
            $data['jadwal'] = $this->apelpagi_service->getArrayJam();
            $data['default'] = '07:15:01 - 08:00:00';

            $filename = $input['kdlokasi'] . date('YmdHis');
            $data['filename_f'] = $this->dir_arsip . $filename . '.pdf';
            $data['filename_f_id'] = $filename;
            $data['filename_d'] = 'Lap_Apelpagi_(' . $input['sdate_submit'] . '_sd_' . $input['edate_submit'] . ')_' . date('His') . '.pdf';

            $data_simpan = $this->presensi_service->getTabel('tb_arsip');
            $data_simpan['id'] = $filename;
            $data_simpan['jenis'] = 'apelpagi';
            $data_simpan['kdlokasi'] = $input['kdlokasi'];
            $data_simpan['filename'] = $filename . '.pdf';
            $data_simpan['dateAdd'] = date('Y-m-d H:i:s');
            $data_simpan['author'] = $this->login['username'];
            $data_simpan['ip'] = comp\FUNC::getUserIp();

            //$this->presensi_service->save('tb_arsip', $data_simpan);
            $this->subView('pdf', $data);
            echo '/unduhlaporan/'.$filename.'/'.$data['filename_d'];
        }
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
