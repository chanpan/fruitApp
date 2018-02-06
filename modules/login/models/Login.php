<?php
namespace app\modules\login\models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author damasac
 */
class Login extends \yii\base\Model{
    //put your code here
    public $username;
    public $password;
    public function rules(){
        return[
             
            ['username','required','message'=>'กรุณากรอก Username'],
            ['password','required','message'=>'กรุณากรอก Password']
        ];
    }
}
