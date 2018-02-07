<?php
 
namespace app\modules\expenses\controllers;
use Yii;
use yii\web\Controller;
class CarController extends Controller{
    public function actionIndex(){
        return $this->render("index");
    }
}
