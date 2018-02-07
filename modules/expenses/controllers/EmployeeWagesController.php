<?php
 
namespace app\modules\expenses\controllers;
use Yii;
use yii\web\Controller;
class EmployeeWagesController extends Controller{
    public function actionIndex() {
        if((!\app\modules\login\classes\CheckLogin::checkLogin())or(\app\modules\login\classes\CheckLogin::checkLogin() && !\app\modules\login\classes\CheckLogin::checkAdmin())){
            return $this->redirect(["/login/default/error"]);
        }
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $sql='SELECT ew.id, ew.emp_price, ew.date_st, ew.date_en,e.name  
            FROM employeewages as ew 
            INNER JOIN employees as e ON ew.emp_id=e.id
            WHERE e.name LIKE :name';
        $params = [":name" => "%$search%"];
        $query = \Yii::$app->db->createCommand($sql,$params)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$query,
            'sort' => [
                'attributes' => [
                    'name',
                    'emp_price',
                    'number_date'
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
        $model = new \app\modules\expenses\models\Employeewages();
        $model->date_st = Date('Y-m-d');
        
        $date = Date('Y-m-d'); /* + 1 day*/
        $date1 = str_replace('-', '/', $date);
        $tomorrow = date('Y-m-d',strtotime($date1 . "+1 days"));
        $model->date_en =$tomorrow;
        

        if ($model->load(\Yii::$app->request->post())) {
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
        $model = \app\modules\expenses\models\Employeewages::findOne($id);
        if ($model->load(\Yii::$app->request->post())) {
            \app\modules\utils\Response::Json();
            if ($model->save()) {
                return ["status" => 'success', 'message' => 'เพิ่มรายการรับซื้อผลไม้เเล้ว'];
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
        $model = \app\modules\expenses\models\Employeewages::findOne($id);
        if($model->delete()){
            \app\modules\utils\Response::Json();
            return ['status'=>'success','message'=>'delete success.'];
        }
    }
    
    
}
