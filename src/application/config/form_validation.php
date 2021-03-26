<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
    'sighup' => array(
        array(
                'field' => 'name',
                'label' => 'ニックネーム',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '%sを入力してください',

                )
        ),
        array(
            'field' => 'mail',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email|trim',
            'errors' => array(
                'required' => '%sを入力してください',
                'valid_email' => 'メールアドレスとして正しくありません'

            )
        ),
        array(
                'field' => 'password',
                'label' => 'パスワード',
                'rules' => 'required|alpha_numeric|min_length[8]|trim',
                'errors' => array(
                    'required' => '%sを入力してください',
                    'alpha_numeric' => '英数字８文字以上で入力してください',
                    'min_length' => '英数字８文字以上で入力してください'
                )

        ),
        array(
                'field' => 'conf_pass',
                'label' => 'パスワード（確認）',
                'rules' => 'required|matches[password]|trim',
                'errors' => array(
                    'required' => '%sを入力してください',
                    'matches' => 'パスワードが一致しません'
                )
        ),
        array(
                'field' => 'first_weight',
                'label' => '体重',
                'rules' => 'required|numeric|trim',
                'errors' => array(
                    'required' => '%sを入力してください',
                    'numeric' => '数字を入力してください'
                )
        ),
        array(
                'field' => 'target_weight',
                'label' => '目標体重',
                'rules' => 'required|numeric|trim',
                'errors' => array(
                    'required' => '%sを入力してください',
                    'numeric' => '数字を入力してください',
                )
        )
        
    ),
   'login' => array(
        array(
                'field' => 'mail',
                'label' => 'メール',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '%sを入力してください',

                )
        ),
        array(
            'field' => 'password',
            'label' => 'パスワード',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => '%sを入力してください',
            )
        ),

   )
);










?>