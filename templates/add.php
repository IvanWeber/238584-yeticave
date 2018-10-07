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
    <form class="form form--add-lot container <?php if($form_invalid){print('form--invalid');}?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <div class="form__item <?php if($field_invalid['lot-name']){print('form__item--invalid');}?>"> <!-- form__item--invalid -->
          <label for="lot-name">Наименование</label>
          <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$filled_field_array['lot-name']?>" required>
          <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?php if($field_invalid['category']){print('form__item--invalid');}?>">
          <label for="category">Категория</label>
          <select id="category" name="category" required>
            <option>Выберите категорию</option>
			<?php foreach ($categories as  $key => $val): ?>
            <option value="<?=$val['id'];?>" <?php if($filled_field_array['category']==$val['id']){print('selected');}?>><?=$val['name'];?></option>
            <?php endforeach; ?>
          </select>
          <span class="form__error">Выберите категорию</span>
        </div>
      </div>
      <div class="form__item form__item--wide <?php if($field_invalid['description']){print('form__item--invalid');}?>">
        <label for="message">Описание</label>
        <textarea id="message" name="description" placeholder="Напишите описание лота" required><?=$filled_field_array['description']?></textarea>
        <span class="form__error">Напишите описание лота</span>
      </div>
      <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
          </div>
        </div>
        <div class="form__input-file">
          <input class="visually-hidden" type="file" id="photo2" name="lot-photo" value="">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
        </div>
      </div>
      <div class="form__container-three">
        <div class="form__item form__item--small <?php if($field_invalid['lot-rate']){print('form__item--invalid');}?>">
          <label for="lot-rate">Начальная цена</label>
          <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$filled_field_array['lot-rate']?>" required>
          <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small <?php if($field_invalid['lot-step']){print('form__item--invalid');}?>">
          <label for="lot-step">Шаг ставки</label>
          <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$filled_field_array['lot-step']?>" required>
          <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?php if($field_invalid['lot-date']){print('form__item--invalid');}?>">
          <label for="lot-date">Дата окончания торгов</label>
          <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$filled_field_array['lot-date']?>" required>
          <span class="form__error">Введите дату завершения торгов</span>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Добавить лот</button>
    </form>
  </main>

