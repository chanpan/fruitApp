<?php
namespace app\modules\login\classes;
 
class Cookie {
    public static function setCookie($name ,$data){
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name'=>$name,
            'value'=>$data,
            'expire'=> time() + 86400 * 360, //1 year
            'secure'=>false,//only if https
            'httpOnly'=>true //js
        ]));
        if($cookies){
            return TRUE;
        }
    }
    public static function getCookie($name){
        $cookies = \Yii::$app->request->cookies;
        return $cookies->getValue($name);
    }
    
    public static function deleteCookie($name){
        $cookies = \Yii::$app->response->cookies;
        if($cookies->remove($name)){
            return TRUE;
        }
    }
}
