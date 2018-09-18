<h1>Sign up page</h1>
<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>

<?php
    $form = ActiveForm::begin(['options' => ['class' => 'signup_form']]);
?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form_btns">
    <button type="submit" class="btn btn-success">Sign up</button>
    <?= Html::a('Sign in', ['user/signin'], ['class' => 'btn btn-default signin_btn']) ?>
</div>

<?php
    ActiveForm::end()
?>
