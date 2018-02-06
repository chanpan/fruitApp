<?php

namespace app\modules\login\controllers;

use yii\web\Controller;

/**
 * Default controller for the `login` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new \app\modules\login\models\Login();
        if ($model->load(\Yii::$app->request->post())) {
            $username =  $_POST["Login"]["username"];
            $password =md5($_POST["Login"]["password"]);
            $sql="SELECT id FROM users WHERE (username=:username OR email = :email) AND password=:password";
            $params=[":username"=>$username, ":email"=>$password, ":password"=>$password];
            $query = \Yii::$app->db->createCommand($sql,$params)->queryOne();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
            if(\app\modules\login\classes\Cookie::setCookie("logins", $query)){
              return ["status"=>"success", "message"=>"Login Success"];
            }else{
              return ["status"=>"error", "message"=>"กรุณาตรวจสอบ Username หรือ Password"];  
            }
          exit();
        }
           
        return $this->render('index', [
            'model'=>$model
        ]);
    }
}
