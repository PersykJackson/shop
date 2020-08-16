<form method="POST" action="/main/order">

    <table>
        <caption>Ваш заказ</caption>
        <tr>
        <?php
        var_dump($_POST);
        $total = 0;
        echo "<td>Наименование</td><td>Цена</td><td>Количество</td></tr>";
        foreach ($vars[0]['basket'] as $key => $value) {
            echo "<tr><td>{$value[0]['name']}</td><td>{$value[0]['cost']}</td><td>";
            $thisVal = $value[0]['id'];
            foreach ($_SESSION['products']['count'] as $k => $val) {
                if ($value[0]['id'] == $k) {
                    echo "$val</td></tr>";
                    $total +=$value[0]['cost'] * $val;
                }
            }

        } ?>

    </table>
    <table>
        <caption>Оформление заказа</caption>
        <tr>
            <td>Имя: </td><td><input type="text" name="firstName" placeholder="Введите имя"></td>
        </tr>
        <tr>
            <td>Фамилия: </td><td><input type="text" name="lastName" placeholder="Введите фамилию"></td>
        </tr>
        <tr>
            <td>Номер телефона: </td><td><input type="number" name="phone" placeholder="Введите номер"></td>
        </tr>
        <tr>
            <td>Дата доставки: </td><td><input type="date" name="date" min="<?=$vars['min']?>" max="<?=$vars['max']?>"></td>
        </tr>
        <tr><td colspan="2"><?="Итоговая сумма: ".$total." грн к оплате"?></td></tr>
        <tr>
            <td colspan="2">
        <select name="payment">
            <option value="cash">Оплата наличными курьеру</option>
            <option value="card">Оплата картой курьеру</option>
        </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="50" rows="10" name="comment" placeholder="Пожелания к заказу"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Заказать">
            </td>
        </tr>
    </table>
</form>
