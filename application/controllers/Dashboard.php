<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Padaidi Corp',
            'page'          => 'Dashboard',
            'sub_page'      => '',
            'content'       => 'dashboard/index'
        ];
        $this->load->view('template/master', $data);
    }
}
