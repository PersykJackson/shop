<?php
$value = $vars['thisOrder']['order'][0];
    echo "Инфо о заказе: <br>
          Имя, фамилия: {$value['firstName']} {$value['lastName']}<br>
          Номер: {$value['phone']}<br>
          Товары: ";
    $counts = explode(', ',$value['counts']);
    foreach($vars['thisOrder']['name'] as $k => $val){
            echo "<br>".$val['name'];
                echo " - ".$counts[$k]." шт.";
            };
    echo "<br>Комментарий к заказу: <br>";
    echo $value = $vars['thisOrder']['order'][0]['comment'];
           echo "<select>";
           foreach($vars['thisOrder']['status'] as $key => $value){
                    if($value['name'] == $vars['thisOrder']['order'][0]['status']){
                        echo "<option selected>{$value['name']}</option>";
                    }else{
                        echo "<option>{$value['name']}</option>";
                    }

           };
            echo "</select>";
            echo "Оставить пометку: <br><textarea name='comment' rows='10' cols='20'></textarea><br><button>Сохранить</button>";

