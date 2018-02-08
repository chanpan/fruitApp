<?php
 
namespace app\modules\expenses\controllers;
use Yii;
use yii\web\Controller;
class CarController extends Controller{
    public function actionIndex() {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $sql='SELECT * FROM cars WHERE list LIKE :name';
        $params = [":name" => "%$search%"];
        $query = \Yii::$app->db->createCommand($sql,$params)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$query,
            'sort' => [
                'attributes' => [
                    'list',
                    'price',
                    'date_st'
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
        $model = new \app\modules\expenses\models\Car();
        if ($model->load(\Yii::$app->request->post())) {
            \app\modules\utils\Response::Json();
            $model->date_st = Date("Y-m-d");
            if ($model->save()) {
                return ["status" => 'success', 'message' => 'Success'];
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
        $model = \app\modules\expenses\models\Car::findOne($id);
        if ($model->load(\Yii::$app->request->post())) {
            \app\modules\utils\Response::Json();
            $model->date_st = Date("Y-m-d");
            if ($model->save()) {
                return ["status" => 'success', 'message' => 'Success'];
            }else{
                return ["status"=>'error', 'message'=>"Server error!"];
            }
        }
        return $this->render("update", [
                    "model" => $model
        ]);
    }
    
    public function actionDelete()
    {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $model = \app\modules\expenses\models\Car::findOne($id);
        if($model->delete()){
            \app\modules\utils\Response::Json();
            return ['status'=>'success','message'=>'delete success.'];
        }
    }
}
