<div class="container">
    <div class="head"><p>Корзина</p></div>
    <div class="contain">


        <?php
        if(count($vars[0]['basket'])) {
            echo "<table>
            <tr>
                <td>Название товара</td><td>Категория</td><td>Цена</td><td>Количество</td>
            </tr>";
            $total = 0;
            foreach ($vars[0]['basket'] as $key => $value) {
                echo "<tr><td>{$value[0]['name']}</td><td>{$value[0]['category']}</td><td>{$value[0][cost]}</td><td>";
                    $thisVal = $value[0]['id'];
                foreach ($_SESSION['products']['count'] as $k => $val) {
                    if ($value[0]['id'] == $k) {
                        echo "<input min='1' type='number' value='{$val}' onmouseup='count(this, $thisVal)' onkeyup='count(this, $thisVal)'></td><td><button value='{$value[0]['id']}' onclick='deleteThisBask(this)'>Удалить</button></td></tr>";
                        $total +=$value[0]['cost'] * $val;
                    }
                }

            }
            echo "</table><br>";
            echo "<div class='total'>Итоговая сумма: ".$total." грн</div><br>";
            echo "<div class='success'><a href='/main/order'>Перейти к оформлению</a></div><div class='back'><a href='/'>Назад</a></div>";
        }else{
            echo "<p>Здесь пока пусто!</p>";
        }
        ?>

    </div>
</div>
