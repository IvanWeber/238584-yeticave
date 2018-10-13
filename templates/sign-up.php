

    <form class="form container <?php if($form_invalid){print('form--invalid');}?>" action="sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
      <h2>Регистрация нового аккаунта</h2>
      <div class="form__item <?php if($field_invalid['email'] || !$email_valid){print('form__item--invalid');}?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value='<?=$filled_field_array['email']?>' required>
        <span class="form__error">Введите e-mail</span>
      </div>
      <div class="form__item <?php if($field_invalid['password']){print('form__item--invalid');}?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value='<?=$filled_field_array['password']?>' required>
        <span class="form__error">Введите пароль</span>
      </div>
      <div class="form__item <?php if($field_invalid['name']){print('form__item--invalid');}?>">
        <label for="name">Имя*</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value='<?=$filled_field_array['name']?>' required>
        <span class="form__error">Введите имя</span>
      </div>
      <div class="form__item <?php if($field_invalid['message']){print('form__item--invalid');}?>">
        <label for="message">Контактные данные*</label>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться" required><?=$filled_field_array['message']?></textarea>
        <span class="form__error">Напишите как с вами связаться</span>
      </div>
      <div class="form__item form__item--file form__item--last">
        <label>Аватар</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
          </div>
        </div>
        <div class="form__input-file">
          <input class="visually-hidden" type="file" id="photo2" value="" name="avatar">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
