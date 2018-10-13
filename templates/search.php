
    <div class="container">
        <section class="lots">
            <h2>Результаты поиска по запросу «<span><?=$_GET['search']?></span>»</h2>
            <ul class="lots__list">
                <?php foreach ($lots as $key => $val): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$val['image']?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$val['category']?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?lot_id=<?=$val['id']?>"><?=$val['name']?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <?php if (isset ($val['bet_id'])): ?>
                                    <span class="lot__amount"><?=$val['bets_num']?> ставок</span>
                                    <span class="lot__cost"><?=$val['price']?><b class="rub">р</b></span>
                                <?php else: ?>
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost"><?=$val['start_price']?><b class="rub">р</b></span>
                                <?php endif; ?>
                            </div>
                            <div class="lot__timer timer">
                                <?=timestamp_format(strtotime($val['end_date_time']) - time()); ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <ul class="pagination-list">
            <?php if($_GET['page']==1): ?>
            <?php else: ?>
                <li class="pagination-item pagination-item-prev"><a href="search.php?page=<?=$_GET['page']-1;?>&search=<?=$_GET['search']?>">Назад</a></li>
            <?php endif; ?>
            <?php foreach ($all_lots as $key => $val): ?>
                <?php if(($key+1)%9==0):?>
            <li class="pagination-item <?php if($_GET['page']==(($key+1)/9)) {print('pagination-item-active');} ?>"><a href="search.php?page=<?=($key+1)/9?>&search=<?=$_GET['search']?>"><?=($key+1)/9?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li class="pagination-item <?php if($_GET['page']==$pages_count) {print('pagination-item-active');} ?>"><a href="search.php?page=<?=$pages_count?>&search=<?=$_GET['search']?>"><?=$pages_count?></a></li>
            <?php if($_GET['page']==$pages_count): ?>
            <?php else: ?>
            <li class="pagination-item pagination-item-next"><a href="search.php?page=<?=$_GET['page']+1;?>&search=<?=$_GET['search']?>">Вперед</a></li>
            <?php endif; ?>
        </ul>
    </div>
