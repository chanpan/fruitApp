<?php

namespace app\modules\fruit\controllers;

use yii\web\Controller;

class DefaultController extends Controller {

    public function actionIndex() {
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $count = \Yii::$app->db->createCommand('SELECT count(*) FROM fruits')->queryScalar();
        $dataProvider = new \yii\data\SqlDataProvider([
            'sql' => 'SELECT * FROM fruits WHERE fruit_name LIKE :fruit_name OR fruit_price LIKE :fruit_price ORDER BY  id DESC',
            'params' => [":fruit_name" => "%$search%", ":fruit_price" => "%$search%"],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ],
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

}
