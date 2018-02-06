<?php
namespace app\modules\login\classes;
class CheckLogin {
    public static function checkLogin(){
        if(\app\modules\user\classes\Identity::user()->loadUser()->getLogin() === TRUE){
            return TRUE;
        }
    }
    public static function checkAdmin(){
        if(\app\modules\user\classes\Identity::user()->loadUser()->getRole() == 1){
            return TRUE;
        }
    }
    
}
