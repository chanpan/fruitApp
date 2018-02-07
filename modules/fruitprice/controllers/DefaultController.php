<?php

namespace app\modules\fruitprice\controllers;
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
        $sql='SELECT * FROM fruitprices WHERE fruit_name LIKE :fruit_name ORDER BY id DESC';
        $params = [":fruit_name"=>"%$search%"];
        $query = \Yii::$app->db->createCommand($sql,$params)->queryAll();
         
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$query,
            'sort' => [
                'attributes' => ['fruit_name','fruit_buy','fruit_unit','create_date'],
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
        $model = new \app\modules\fruitprice\models\Fruitprices();
        if ($model->load(Yii::$app->request->post()) ) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->create_date = Date("Y-m-d H:i:s");
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
        $model = \app\modules\fruitprice\models\Fruitprices::findOne($id);
        if ($model->load(Yii::$app->request->post()) ) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->create_date = Date("Y-m-d H:i:s");
            if($model->save()){
                return ['status'=>'success', 'message'=>'เพิ่ม User สำเร็จ'];
            }else{
                return ['status'=>'error', 'message'=>'Server Error'];
            }
        } else {
            return $this->render('update', [
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
        $model = \app\modules\fruitprice\models\Fruitprices::findOne($id);
        if($model->delete()){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['status'=>'success','message'=>'delete success.'];
        }
        
    }
}
