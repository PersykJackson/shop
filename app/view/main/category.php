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
