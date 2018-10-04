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
            <img src="img/lot-<?=$lot[0]['id']?>.jpg" width="730" height="548" alt="Сноуборд">
          </div>
          <p class="lot-item__category">Категория: <span><?=$lots_related[0]['category']?></span></p>
          <p class="lot-item__description"><?=$lot[0]['description']?></p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
            <div class="lot-item__timer timer">
              10:54:12
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">
                    <?php if (isset($lots_related[0]['end_date'])):?>
                    Конечная цена
                    <?php else: ?>
                    Текущая цена
                    <?php endif; ?>
                </span>
                <span class="lot-item__cost">
                    <?php if(isset($lots_related[0]['last_bet_price'])): ?>
                    <?=ruble_display($lots_related[0]['last_bet_price'])?>
                  <?php else: ?>
                  <?=ruble_display($lots_related[0]['start_price'])?>
                    <?php endif; ?>
                </span>
              </div>
              <div class="lot-item__min-cost">
                  <?php if (isset($lots_related[0]['last_bet_price'])): ?>
                         <?php if (!isset($lots_related[0]['end_date'])):?>
                Мин. ставка
                  <span><?=ruble_display($lots_related[0]['last_bet_price']+$lot[0]['bet_step'])?></span>
                         <?php else: ?>
                      <span>Лот закрыт <?=$lots_related[0]['end_date']?></span>
                         <?php endif;?>
                  <?php else: ?>
                         <?php if (!isset($lots_related[0]['end_date'])):?>
                  Мин. ставка
                  <span><?=ruble_display($lots_related[0]['start_price']+$lot[0]['bet_step'])?></span>
                         <?php else: ?>
                  <span>Лот закрыт <?=$lots_related[0]['end_date']?></span>
                         <?php endif;?>
                  <?php endif;?>

              </div>
            </div>
              <!--
            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
              <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="12 000">
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
            -->
          </div>
          <div class="history">
              <!--
            <h3>История ставок (<span>10</span>)</h3>
            <table class="history__list">
              <tr class="history__item">
                <td class="history__name">Иван</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">5 минут назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Константин</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">20 минут назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Евгений</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">Час назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Игорь</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 08:21</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Енакентий</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 13:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Семён</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 12:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Илья</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 10:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Енакентий</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 13:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Семён</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 12:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Илья</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 10:20</td>
              </tr>
            </table>
            -->
          </div>
        </div>
      </div>
    </section>
</main>