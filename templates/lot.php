<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
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
    <section class="lot-item container">
        <h2><?=$lot[0]['name']?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$lot[0]['image']?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$lots_related[0]['category']?></span></p>
                <p class="lot-item__description"><?=$lot[0]['description']?></p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        <?php if($time_left>0):?>
                            <?=timestamp_format($time_left);?>
                        <?php endif; ?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <?php if ($time_left>0):?>
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"> <?php if(isset($lots_related[0]['last_bet_price'])): ?>
                                        <?=ruble_display($lots_related[0]['last_bet_price'])?>
                                    <?php else: ?>
                                        <?=ruble_display($lots_related[0]['start_price'])?>
                                    <?php endif; ?></span>
                            <?php else: ?>
                                <span class="lot-item__amount">Конечная цена</span>
                                <span class="lot-item__cost"> <?php if(isset($lots_related[0]['last_bet_price'])): ?>
                                        <?=ruble_display($lots_related[0]['last_bet_price'])?>
                                    <?php else: ?>
                                        <?=ruble_display($lots_related[0]['start_price'])?>
                                    <?php endif; ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($lots_related[0]['last_bet_price'])): ?>
                            <?php if ($time_left>0):?>
                                <div class="lot-item__min-cost">
                                    Мин. ставка <span><?=ruble_display($lots_related[0]['last_bet_price']+$lot[0]['bet_step'])?></span>
                                </div>
                            <?php else: ?>
                                <div class="lot-item__min-cost">
                                    Лот закрыт <span><?=$lots_related[0]['end_date_time']?></span>
                                </div>
                            <?php endif;?>
                        <?php else: ?>
                            <?php if ($time_left>0):?>
                                <div class="lot-item__min-cost">
                                    Мин. ставка <span><?=ruble_display($lots_related[0]['start_price']+$lot[0]['bet_step'])?></span>
                                </div>
                            <?php else: ?>
                                <div class="lot-item__min-cost">
                                    Лот закрыт <span><?=$lots_related[0]['end_date_time']?></span>
                                </div>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
            <?php if (isset($_SESSION['user']) and $time_left>0): ?>
            <form class="lot-item__form" action="lot.php?lot_id=<?=(int)$_GET['lot_id']?>" method="post">
              <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="<?php if (isset($lots_related[0]['last_bet_price']))
                {ruble_display($lots_related[0]['last_bet_price']+$lot[0]['bet_step']);} else
                    {ruble_display($lots_related[0]['start_price']+$lot[0]['bet_step']);} ?>">
                  <?php if ($error_add_bet): ?><span>Введите корректную сумму</span><?php endif; ?>
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
            <?php endif; ?>
          </div>
           <div class="history">

              <?php if (isset($_SESSION['user'])): ?>
            <h3>История ставок (<span>10</span>)</h3>
            <table class="history__list">
                <?php foreach($bet_query_array as $key=>$val): ?>
              <tr class="history__item">
                <td class="history__name"><?=$val['name']?></td>
                <td class="history__price"><?=ruble_display($val['price'])?></td>
                <td class="history__time"><?php if((time()- strtotime($val['date']))>86400) {$val['date'];}
                else {timestamp_format(time()- strtotime($val['date'])); print(' назад');}?></td>
              </tr>
                <?php if($key==9) {break;}?>
                <?php endforeach; ?>
            </table>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
</main>