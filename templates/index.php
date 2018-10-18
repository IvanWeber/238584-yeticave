<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
            снаряжение.</p>
        <ul class="promo__list">
            <!--заполните этот список из массива категорий-->
            <?php foreach ($categories as $key => $val): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="lots-by-category.php?category_id=<?=$val['id']?>&page=1"><?= $val['name']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    </nav>
    <div class="container">
        <section class="lots">
            <h2>Открытые лоты</h2>
            <ul class="lots__list">
                <?php foreach ($lots as $key => $val): ?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src="<?= $val['image'] ?>" width="350" height="260" alt="Сноуборд">
                        </div>
                        <div class="lot__info">
                            <span class="lot__category"><?= $val['category'] ?></span>
                            <h3 class="lot__title"><a class="text-link"
                                                      href="lot.php?lot_id=<?= $val['id'] ?>"><?= $val['name'] ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <?php if (isset ($val['bet_id'])): ?>
                                        <span class="lot__amount"><?= $val['bets_num'] ?> ставок</span>
                                        <span class="lot__cost"><?= $val['price'] ?><b class="rub">р</b></span>
                                    <?php else: ?>
                                        <span class="lot__amount">Стартовая цена</span>
                                        <span class="lot__cost"><?= $val['start_price'] ?><b class="rub">р</b></span>
                                    <?php endif; ?>
                                </div>
                                    <div class="lot__timer timer <?php if ((strtotime($val['end_date_time']) - time())<604800) {print('timer--finishing');};?>">
                                        <?=timestamp_format(strtotime($val['end_date_time']) - time());?>
                                    </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <ul class="pagination-list">
            <?php if ((int)$_GET['page'] === 1): ?>
            <?php else: ?>
                <li class="pagination-item pagination-item-prev"><a
                            href="index.php?page=<?= $_GET['page'] - 1; ?>">Назад</a></li>
            <?php endif; ?>
            <?php foreach ($all_lots as $key => $val): ?>
                <?php if ((($key + 1) % 9 === 0) && (($key + 1) / 9!==(int)$pages_count)): ?>
                    <li class="pagination-item <?php if ((int)$_GET['page'] === (($key + 1) / 9)) {
                        print('pagination-item-active');
                    } ?>">
                        <a href="index.php?page=<?= ($key + 1) / 9 ?>"><?= ($key + 1) / 9 ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li class="pagination-item <?php if ((int)$_GET['page'] === (int)$pages_count) {
                print('pagination-item-active');
            } ?>"><a href="index.php?page=<?= $pages_count ?>"><?= $pages_count ?></a></li>
            <?php if ((int)$_GET['page'] === (int)$pages_count): ?>
            <?php else: ?>
                <li class="pagination-item pagination-item-next"><a
                            href="index.php?page=<?= $_GET['page'] + 1; ?>">Вперед</a></li>
            <?php endif; ?>
        </ul>
    </div>
</main>