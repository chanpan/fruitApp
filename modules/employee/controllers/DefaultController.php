<?php

namespace app\modules\employee\controllers;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
     public function actionIndex()
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin()) or (\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $search = isset($_GET["search"]) ? $_GET["search"] : "";      
        $sql='SELECT * FROM employees WHERE name LIKE :name ORDER BY id DESC';
        $params = [":name"=>"%$search%"];
        $query = \Yii::$app->db->createCommand($sql,$params)->queryAll();
         
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$query,
            'sort' => [
                'attributes' => ['name','cid','tel','wage','unit'],
            ],
        ]);
        return $this->render('index', [       
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $model = new \app\modules\employee\models\Employees();
        if ($model->load(Yii::$app->request->post()) ) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if($model->save()){
                return ['status'=>'success', 'message'=>'เพิ่ม User สำเร็จ'];
            }else{
                return ['status'=>'error', 'message'=>'Server Error'];
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'profile'=>$profile,
                'role'=>$role
            ]);
        }
    }
    
    public function actionUpdate($id)
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $model = \app\modules\employee\models\Employees::findOne($id);
        if ($model->load(Yii::$app->request->post()) ) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if($model->save()){
                return ['status'=>'success', 'message'=>'เพิ่ม User สำเร็จ'];
            }else{
                return ['status'=>'error', 'message'=>'Server Error'];
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'profile'=>$profile,
                'role'=>$role
            ]);
        }
    }
    
     public function actionDelete()
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $model = \app\modules\employee\models\Employees::findOne($id);
        if($model->delete()){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['status'=>'success','message'=>'delete success.'];
        }
        
    }
}
