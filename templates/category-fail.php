<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $key => $val): ?>
            <li class="nav__item <?php if ($val['id']===$_GET['category_id']) {print(' nav__item--current');};?>">
                <a href="lots-by-category.php?category_id=<?=$val['id']?>&page=1"><?= $val['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="container">
    <section class="lots">
        <h2>Не найдено ни одного лота выбранной категории</h2>
    </section>
</div>
