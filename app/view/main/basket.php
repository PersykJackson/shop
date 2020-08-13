<div class="container">
    <div class="head"><p>Корзина</p></div>
    <div class="contain">


        <?php
        if(count($vars[0]['basket'])) {
            echo "<table>
            <tr>
                <td>Название товара</td><td>Категория</td><td>Цена</td><td>Количество</td>
            </tr>";

            foreach ($vars[0]['basket'] as $key => $value) {
                echo "<tr><td>{$value[0][name]}</td><td>{$value[0][category]}</td><td>{$value[0][cost]}</td><td>";
                foreach ($_SESSION['products']['count'] as $k => $val) {
                    if ($value[0][id] == $k) {
                        echo "<input type='text' value='{$val}'></td><td><button value='{$value[0][id]}' onclick='deleteThisBask(this)'>Удалить</button></td></tr>";
                    }
                }

            }
            echo "</table>";
            echo "<div class='success'></div>";
        }else{
            echo "<p>Здесь пока пусто!</p>";
        }
        ?>

    </div>
</div>
