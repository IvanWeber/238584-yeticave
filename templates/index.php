
<main class="container">
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach ($categories as $key => $val): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?=$val['name'];?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($adverts as $key => $val): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=htmlspecialchars($val['url'])?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=htmlspecialchars($val['category'])?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?lot_id=<?=$val['lot_id']?>"><?=htmlspecialchars($val['name'])?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <?php if (isset ($val['bet_id'])): ?>
                                <span class="lot__amount"><?=$val['bets_num']?> ставок</span>
                                <span class="lot__cost"><?=ruble_display(htmlspecialchars($val['price']))?> </span>
                            <?php else: ?>
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=ruble_display(htmlspecialchars($val['start_price']))?> </span>
                            <?php endif; ?>
                        </div>
                        <div class="lot__timer timer">
                        <?= timestamp_format(strtotime($val['end_date_time'])-time()) ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
</main>