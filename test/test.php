<?php
include('Auth.php');
$user = new connect();
?>

<div class="container d-flex justify-content-center h-100">
    <div class="row">
        <div class="col-sm-8 col-md-12 col-md-offset-5">
            <h1 class="text-center login-title">Войти</h1>
            <div class="account-wall">
            <form method="post" class="form-group">
                Логин: <input type="text" class="form-control" name="login" /><br />
                Пароль: <input type="password" class="form-control" name="password" /><br />
                <input type="submit" name="submit" class="form-control" value="Войти" />
            </form>
            </div>
        </div>
    </div>
</div>

<?php

var_dump($user->login($_POST['login'], $_POST['password']));

?>