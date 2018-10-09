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
    <form class="form container <?php if($form_invalid){print('form--invalid');}?>" action="login.php" method="post"> <!-- form--invalid -->
      <h2>Вход</h2>
      <div class="form__item <?php if($field_invalid['email']){print('form__item--invalid');}?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value='<?=$filled_field_array['email']?>' required>
        <span class="form__error">Введите e-mail</span>
      </div>
      <div class="form__item form__item--last <?php if($field_invalid['password']){print('form__item--invalid');}?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value='<?=$filled_field_array['password']?>' required>
        <span class="form__error">Введите пароль</span>
      </div>
      <button type="submit" class="button">Войти</button>
    </form>
  </main>