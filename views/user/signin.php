<h1>Sign in page</h1>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php
$form = ActiveForm::begin(['options' => ['class' => 'signin_form']]);
?>

<?= $form->field($signin_model, 'username')->textInput(['autofocus' => true]) ?>
<?= $form->field($signin_model, 'password')->passwordInput() ?>

<div class="form_btns">
    <button type="submit" class="btn btn-success">Sign in</button>
    <?= Html::a('Sign up', ['user/signup'], ['class' => 'btn btn-default signup_btn']) ?>
</div>

<?php
ActiveForm::end()
?>
