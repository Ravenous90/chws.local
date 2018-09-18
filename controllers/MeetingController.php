<?php
/**
 * Created by PhpStorm.
 * User: askolotii
 * Date: 18.09.2018
 * Time: 10:57
 */

namespace app\controllers;


use yii\web\Controller;

class MeetingController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}