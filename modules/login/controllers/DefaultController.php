<?php

namespace app\modules\login\controllers;

use yii\web\Controller;

/**
 * Default controller for the `login` module
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new \app\modules\login\models\Login();
        if ($model->load(\Yii::$app->request->post())) {
            $username =  $_POST["Login"]["username"];
            $password =md5($_POST["Login"]["password"]);
            $sql="SELECT id FROM users WHERE (username=:username OR email = :email) AND password=:password";
            $params=[":username"=>$username, ":email"=>$password, ":password"=>$password];
            $query = \Yii::$app->db->createCommand($sql,$params)->queryOne();
            $setCookie = \app\modules\login\classes\Cookie::setCookie("logins", $query);
            \app\modules\utils\Response::Json();
            if(!empty($query) && $setCookie){
                return ["status"=>"success", "message"=>"Login Success"];
            }
            return ["status"=>"error", "message"=>"กรุณาตรวจสอบ Username หรือ Password"]; 
           
        }
           
        return $this->render('index', [
            'model'=>$model
        ]);
    }
    public function actionLogout(){
        \app\modules\login\classes\Cookie::deleteCookie("logins");
        return $this->redirect(["/site/index"]);
    }
    public function actionError(){
        return $this->render("_error");
    }
}
