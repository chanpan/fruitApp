<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\utils;

/**
 * Description of Response
 *
 * @author damasac
 */
class Response {
    public static function Json(){
        return \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
}
