<?php
class My_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();


        $this->load->model('Action');
    }
}
