<?php

namespace app\modules\user\controllers;

use Yii;
use app\modules\user\models\Users;
use app\modules\user\models\Profiles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
{
  
    public function actionIndex()
    {
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $count = Yii::$app->db->createCommand('SELECT count(*) FROM users')->queryScalar(); 
        $dataProvider = new \yii\data\SqlDataProvider([
           'sql'=> 'SELECT * FROM users as u INNER JOIN profiles as p ON u.id = p.user_id WHERE u.email LIKE :email',
            'params'=>[":email"=>"%$search%"],
            'totalCount'=>$count,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'email',
                    'username',
                    'fname',
                    'lname',
                    'tel'
                ],
            ],
        ]);
        return $this->render('index', [       
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Users();
        $profile = new Profiles();
        $role = \app\modules\user\models\Roles::find()->all();
        $role = \yii\helpers\ArrayHelper::map($role,"id","role_name"); 

        if ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && \yii\base\Model::validateMultiple([$model, $profile])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->id = Time().rand(9,999);
            $model->create_at = Date("Y-m-d H:i:s");
            $model->role = $_POST["Users"]["role"];
            $model->password = md5($_POST["Users"]["password"]);
            if($model->save()){
                $profile->user_id = $model->id;
                $profile->save();
                return ['status'=>'success'];
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
        $model = Users::findOne($id);
        $profile = Profiles::findOne($id);
         
        if ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && \yii\base\Model::validateMultiple([$model, $profile])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->update_at = Date("Y-m-d H:i:s");
            if($model->save()){
                $profile->save();
                return ['status'=>'success'];
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'profile'=>$profile,
                 
            ]);
        }
    }
 
    public function actionDelete($id)
    {
        $sqlUser = "DELETE FROM users WHERE id=:id";
        $sqlProfile = "DELETE FROM profiles WHERE user_id = :user_id";
        $user = Yii::$app->db->createCommand($sqlUser,[":id"=>$id])->execute();
        $profile = Yii::$app->db->createCommand($sqlProfile,[":user_id"=>$id])->execute();
        if($user && $profile){
            return $this->redirect(['index']);
        }
        
    }
 
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
