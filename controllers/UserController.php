<?php
/**
 * Created by PhpStorm.
 * User: askolotii
 * Date: 18.09.2018
 * Time: 10:00
 */

namespace app\controllers;

use app\models\Signin;
use app\models\Signup;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup'])) {
            $model->attributes = Yii::$app->request->post('Signup');

            if ($model->validate() && $model->signup()) {
                return $this->goHome();
            }
        }
        return $this->render('signup',['model' => $model]);
    }

    public function actionSignin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $signin_model = new Signin();

        if ( Yii::$app->request->post('Signin')) {
            $signin_model->attributes = Yii::$app->request->post('Signin');

            if ($signin_model->validate()) {
                Yii::$app->user->login($signin_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('signin',['signin_model' => $signin_model]);
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['signin']);
        }
    }
}