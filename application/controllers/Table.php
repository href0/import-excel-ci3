<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('excel', 'session'));
        $this->load->model('tags_model', 'tags');
    }
    public function index()
    {
        $data = [
            'title'         => 'Table 1',
            'page'          => 'Table',
            'table'          => $this->tags->getData(),
            'sub_page'      => '',
            'content'       => 'table/index'
        ];
        $this->load->view('template/master', $data);
    }



    // public function index()
    // {
    //     $this->load->model('ImportModel');
    //     $data = array(
    //         'list_data'    => $this->ImportModel->getData()
    //     );
    //     $this->load->view('import_excel.php', $data);
    // }

    public function import_excel()
    {

        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $tag = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $temp_data[] = array(
                        'tag'    => $tag,
                    );
                }
            }

            // $this->load->model('ImportModel');
            $insert = $this->tags->insert($temp_data);

            if ($insert) {
                $this->session->set_flashdata('message', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('message', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }
}
