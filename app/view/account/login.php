<?php if($vars['error']){
    echo "$vars[error]";
} ?>
<form method="post" action="/account/login">
    <p>Login</p>
    <input type="text" name="login" placeholder="input your login">
    <input type="password" name="password" placeholder="input your password">
    <input type="submit" value="GO">
</form><br>
<a href="/account/register">Регистрация</a><br>
<a href="/">Главная</a>
