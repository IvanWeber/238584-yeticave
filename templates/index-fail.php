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
            <h2>Не найдено ни одного открытого лота</h2>
        </section>
    </div>
</main>