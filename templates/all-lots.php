<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item nav__item--current">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <section class="lots">
            <h2>История просмотров</h2>
            <?php if($indexProduct):?>
            <ul class="lots__list">
                    <?php $i=0; foreach ($indexProduct as $product):?>
                        <li class="lots__item lot">
                            <a href="lot.php?product_id=<?php echo $i++; ?>">
                                <div class="lot__image">
                                    <img src="<?php echo $array_product[$product]['url']?>" width="350" height="260" alt="Сноуборд">
                                </div>
                                <div class="lot__info">
                                    <span class="lot__category"><?php echo $array_product[$product]['category']?></span>
                                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?php echo $array_product[$product]['Name']?></a></h3>
                                    <div class="lot__state">
                                        <div class="lot__rate">
                                            <span class="lot__amount">Стартовая цена</span>
                                            <span class="lot__cost"><?php echo formatSumm($array_product[$product]['price'])?></span>
                                        </div>
                                        <div class="lot__timer timer">
                                            <?php echo $timer?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach;?>
            </ul>

        </section>
        <ul class="pagination-list">
            <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
            <li class="pagination-item pagination-item-active"><a>1</a></li>
            <li class="pagination-item"><a href="#">2</a></li>
            <li class="pagination-item"><a href="#">3</a></li>
            <li class="pagination-item"><a href="#">4</a></li>
            <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
        </ul>
        <?php  else:?>
            <h2>Вы не просмотрели еще ни одного товара</h2>
        <?php endif;?>
    </div>
</main>


