<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caloline extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','session');
        $this->load->helper('security','form', 'menu_helper');
        $this->load->model('Caloline_model');
    }
    
    //トップページ
    public function index()
    {
        $this->load->view('top_view');
    }
    
    //サインアップ
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
                $data['error_mess'] = '「目標体重」は「現在の体重」より小さい数値を入力してください';
            }
        }
        
        $this->load->view('sighup_view',$data);
        
    }    

    //ログイン
    public function login()
    {
        $data = $this->input->post();
        if($this->form_validation->run('login')){
            $result = $this->Caloline_model->get_users_login($data);

            if($result !== false){
                $data = [
                    'admin_login' => $result['user_id']
                ];
                $this->session->set_userdata($data);
                header('Location: main');
                exit;
            }else{
                $data['error_mess'] = 'メールアドレスまたはパスワードが一致しません';
            }
        }    
        $this->load->view('login_view',$data);
    }

    //メインページ
    public function main()
    {
        $this->load->view('main_view');
    }


    //プロフィールページ
    public function profile()
    {
        $this->load->view('profile_view');
    }


}