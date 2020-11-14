<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caloline extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    
    public function index()
    {
        $this->load->view('top_view');
    }

    /**
     * メインページ表示
     */
    public function main()
    {
        $this->load->view('main_view');
    }

    /**
     * ログインページ
     */
    public function login()
    {
        $this->load->view('login_view');
    }

    /**
     * プロフィールページ
     */
    public function profile()
    {
        $this->load->view('profile_view');
    }

    /**
     * サインアップ
     */
    public function sighup()
    {
        $this->load->view('sighup_view');
    }
}