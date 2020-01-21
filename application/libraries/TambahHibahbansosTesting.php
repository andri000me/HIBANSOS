<?php

use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;



class TambahHibahbansosTesting
{
    private $controller;
    private $userRequest;
    public function __construct(array $param)
    {
        $this->controller = $param['instance'];
        if (!$this->controller instanceof ControllerHibahBansos){
            echo 'sorry this class not for tested';
        }
    }

    private function setSession(){
        $where = array(
            'username' => 'khrisnawd',
            'passHash' => md5('1q2w3e4r')
        );
        $user = $this->controller->M_user->readUser($where);
        if ($user->num_rows() === 1){
            $user = $user->result()[0];
            $this->controller->session->set_userdata(['user'=>$user]);
        }
    }
    private function removeSession(){
        $this->controller->session->sess_destroy();
    }

    public function run(){
        $this->setSession();
        echo $this->controller->input->cookie('ci_session');
    }


    public function exitTest(){
        $this->setSession();
    }
}

