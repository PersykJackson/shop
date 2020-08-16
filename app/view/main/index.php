<div class="container">
<div class="menu">
    <div class="name">
        <h2>РоМашка</h2>
    </div>
    <?php
    echo "<div class='account'>";
    if(!$_SESSION['auth']){

    echo
    "<div class='login'><a class='login' href='account/login'>Вход</a><br>
    <a class='register' href='account/register'>Регистрация</a></div>";

    }else{
        echo "<div class='accountInfo'>Name: $_SESSION[name]</div>";
    };?>

    </div>
    <div class="basket">
        <button class="basketBtn" onclick="show()">Корзина</button>
        <div class="hide">
            <?php
                    if (count($vars[1]['basket'])) {
                        echo "<table>
                    <tr>
                    <td>Наименование</td><td>Категория</td><td>Цена</td><td>Количество</td></tr>";
                        foreach ($vars[1]['basket'] as $key => $value) {
                            echo "<tr><td>{$value[0][name]}</td><td>{$value[0][category]}</td><td>{$value[0][cost]}</td><td>";
                            foreach ($_SESSION['products']['count'] as $k => $val) {
                                if ($value[0][id] == $k) {
                                    echo $val . "</td><td><button value='{$value[0][id]}' onclick='deleteThis(this)'>Удалить</button></td></tr>";
                                }
                            }

                        }

                        echo "</table>";
                        echo "<a href='main/basket'>Оформить заказ</a><button onclick='basketClean()'>Очистить корзину</button>";
                    }else{
                        echo "<p>Здесь пока ничего нет!</p>";
                    }

            ?>

        </div>
    </div>




</div>
    <hr>
    <div class="content">
<div class="categories"><h3>Категории</h3>
    <list>

        <?php echo  "<li><button value='_' onclick='onCategory(this)'>Все</button></li>"; foreach($vars[2]['category'] as $key => $value){
            echo  "<li><button value='{$value['id']}' onclick='onCategory(this)'>{$value['name']}</button></li>";
        }?>
    </list></div>
    <div class="products">
        <div class="title"><h3>Товары</h3></div>
        <div class="contain">
            <?php
            foreach ($vars[0]['prod'] as $key => $val){
                echo "<div class='product'>
                           <p>$val[name]</p>
                          <img src=".'/public/images/products/'.$val['src'].'.jpg'.">
                          <h3>$val[cost] грн</h3>
                          <h5>Категория: $val[category]</h5>
                          <div class='buyBtn'><button value='$val[id]' onclick=add(this)>Купить</button></div>
                    </div>";
            }
            ?>
        </div>
    </div>

    </div>
</div>
