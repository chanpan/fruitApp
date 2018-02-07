<?php
 
namespace app\modules\expenses\controllers;
use Yii;
use yii\web\Controller;
class EmployeeController extends Controller{
    public function actionIndex(){
        return $this->render("index");
    }
}
