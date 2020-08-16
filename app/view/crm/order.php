<table class="orders">
    <tr>
        <td>Номер заказа</td>
        <td>Имя клиента</td>
        <td>Телефон</td>
        <td>Дата заказа</td>
        <td>Оплата</td>
        <td>Статус</td>
    </tr>
    <?php
    foreach ($vars['Orders'] as $key => $value){
        echo "<tr><td>{$value['id']}</td><td>{$value['firstName']}</td><td>{$value['phone']}</td><td>{$value['buyDate']}</td><td>{$value['payment']}</td><td>{$value['status']}</td><td><button value='{$value['id']}' onclick='inOrder($value[id])'>Заказ</button></td></tr>";
    };
    ?>
</table>
