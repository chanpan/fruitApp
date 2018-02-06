<?php

namespace app\modules\fruit\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller {

    public function actionIndex() {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $sql='SELECT * FROM fruits WHERE fruit_name LIKE :fruit_name OR fruit_price LIKE :fruit_price ORDER BY  id DESC';
        $params = [":fruit_name" => "%$search%", ":fruit_price" => "%$search%"];
        $query = \Yii::$app->db->createCommand($sql,$params)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$query,
            'sort' => [
                'attributes' => [
                    'fruit_name',
                    'fruit_price',
                    'fruit_amount',
                    'fruit_unit',
                    'fruit_date'
                ],
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $model = new \app\modules\fruit\models\Fruits();
        if ($model->load(\Yii::$app->request->post())) {
            $model->fruit_date = Date("Y-m-d H:i:s");
             \app\modules\utils\Response::Json();
            if ($model->save()) {
                return ["status" => 'success', 'message' => 'เพิ่มรายการรับซื้อผลไม้เเล้ว'];
            }else{
                return ["status"=>'error', 'message'=>"Server error!"];
            }
        }
        return $this->render("create", [
                    "model" => $model
        ]);
    }

    public function actionUpdate($id) {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $model = \app\modules\fruit\models\Fruits::findOne($id);
        if ($model->load(\Yii::$app->request->post())) {
             \app\modules\utils\Response::Json();
            if ($model->save()) {
                return ["status" => 'success', 'message' => 'แก้ไขรายการรับซื้อผลไม้เเล้ว'];
            }else{
                return ["status"=>'error', 'message'=>"Server error!"];
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }
    
    public function actionDelete()
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $sql = "DELETE FROM fruits WHERE id=:id";        
        $model = \Yii::$app->db->createCommand($sql,[":id"=>$id])->execute();
        if($model){
            \app\modules\utils\Response::Json();
            return ['status'=>'success','message'=>'delete success.'];
        }
        
    }

}
