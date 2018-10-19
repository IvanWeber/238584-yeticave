<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $key => $val): ?>
            <li class="nav__item <?php if ($val['id'] === $_GET['category_id']) {
                print(' nav__item--current');
            }; ?>">
                <a href="lots-by-category.php?category_id=<?= $val['id'] ?>&page=1"><?= $val['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="container">
    <section class="lots">
        <h2>Все лоты в категории <span><?= $lots[0]['category'] ?></span></h2>
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
                            <?php if (strtotime($val['end_date_time']) - time() > 0): ?>
                                <div class="lot__timer timer <?php if ((strtotime($val['end_date_time']) - time()) < 604800) {
                                    print('timer--finishing');
                                }; ?>">
                                    <?= timestamp_format(strtotime($val['end_date_time']) - time()); ?>
                                </div>
                            <?php else: ?>
                                <div>
                                    <?= 'Лот закрыт ' . $val['end_date_time']; ?>
                                </div>
                            <?php endif; ?>
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
                        href="lots-by-category.php?page=<?= $_GET['page'] - 1; ?>&category_id=<?= $_GET['category_id'] ?>">Назад</a>
            </li>
        <?php endif; ?>
        <?php foreach ($all_lots as $key => $val): ?>
            <?php if ((($key + 1) % 9 === 0) && (($key + 1) / 9 !== (int)$pages_count)): ?>
                <li class="pagination-item <?php if ((int)$_GET['page'] === (($key + 1) / 9)) {
                    print('pagination-item-active');
                } ?>">
                    <a href="lots-by-category.php?page=<?= ($key + 1) / 9 ?>&category_id=<?= $_GET['category_id'] ?>"><?= ($key + 1) / 9 ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        <li class="pagination-item <?php if ((int)$_GET['page'] === (int)$pages_count) {
            print('pagination-item-active');
        } ?>">
            <a href="lots-by-category.php?page=<?= $pages_count ?>&category_id=<?= $_GET['category_id'] ?>"><?= $pages_count ?></a>
        </li>
        <?php if ((int)$_GET['page'] === (int)$pages_count): ?>
        <?php else: ?>
            <li class="pagination-item pagination-item-next"><a
                        href="lots-by-category.php?page=<?= $_GET['page'] + 1; ?>&category_id=<?= $_GET['category_id'] ?>">Вперед</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
