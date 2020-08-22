<?php if($vars['error']){
    echo "<li>".$vars['error']."</li>";
} ?>
<form method="post" action="/account/register">
    <table>
    <caption>Регистрация</caption>
        <tr>
            <td>Логин</td><td><input type="text" name="login" placeholder="Введите логин"></td>
        </tr>
        <tr>
            <td>Пароль</td><td><input type="password" name="password" placeholder="Введите пароль"></td>
        </tr>
        <tr>
            <td>Повторно</td><td><input type="password" name="password2" placeholder="Подтвердите пароль"></td>
        </tr>
        <tr>
    <td>Почта</td><td><input type="email" name="email" placeholder="Введите почту"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="GO"></td>
        </tr>
        <tr>
            <td colspan="2"><a href="/account/login">Вход</a></td>
        </tr>
        <tr>
            <td colspan="2"><a href="/">Главная</a></td>
        </tr>
    </table>
</form>