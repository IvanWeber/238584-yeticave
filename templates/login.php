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
     <form class="form container <?php if(isset($errors['email']) or isset($errors['password'])){print('form--invalid');}?>" action="login.php" method="post"> <!-- form--invalid -->
      <h2>Вход</h2>
        <?php $classname = isset($errors['email']) ? "form__item--invalid" : "";
        $value = isset($form['email']) ? $form['email'] : ""; ?>
      <div class="form__item <?=$classname;?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value='<?=$value;?>' required>
          <?php if ($classname): ?>
        <span class="form__error">Введите e-mail <?=$errors['email'];?></span>
          <?php endif; ?>
      </div>
         <?php $classname = isset($errors['password']) ? "form__item--invalid" : "";
         $value = isset($form['password']) ? $form['password'] : ""; ?>
      <div class="form__item form__item--last <?=$classname;?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value='' required>
          <?php if ($classname): ?>
        <span class="form__error">Введите пароль <?=$errors['password'];?></span>
          <?php endif; ?>
      </div>

      <button type="submit" class="button">Войти</button>
    </form>
  </main>