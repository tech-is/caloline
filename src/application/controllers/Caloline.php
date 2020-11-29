<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caloline extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','session');
        $this->load->helper('security','form');
        $this->load->model('Caloline_model');
    }
    
    
    public function index()
    {
        $this->load->view('top_view');
    }
    
    /**
     * サインアップ
     */
    public function sighup()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'mail' => $this->input->post('mail'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'first_weight' => $this->input->post('first_weight'),
            'target_weight' =>  $this->input->post('target_weight'),
            'poss_menu_id' => implode(",", (array)$this->input->post('poss_menu'))
        );
        
        if($this->form_validation->run('sighup')){
            if($data['first_weight'] > $data['target_weight']){
                if($this->Caloline_model->set_user($data)){
                    $data['success_mess'] = '会員登録が完了しました！';
                }
            }else{
                $data['error_mess'] = '現在の体重より小さい数値を入力してください';
            }
        }
        
        $this->load->view('sighup_view',$data);
        
    }    

    /**
     * ログインページ
     */
    public function login()
    {
        $this->load->view('login_view');
    }

    /**
     * メインページ表示
     */
    public function main()
    {
        $this->load->view('main_view');
    }
    

    /**
     * プロフィールページ
     */
    public function profile()
    {
        $this->load->view('profile_view');
    }

}