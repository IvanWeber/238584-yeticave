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
    <ul class="pagination-list">
        <?php if ((int)$_GET['page'] === 1): ?>
        <?php else: ?>
            <li class="pagination-item pagination-item-prev"><a
                    href="lots-by-category.php?page=<?= $_GET['page'] - 1; ?>&category_id=<?= $_GET['category_id'] ?>">Назад</a></li>
        <?php endif; ?>
        <?php foreach ($all_lots as $key => $val): ?>
            <?php if ((($key + 1) % 9 === 0) && (($key + 1) / 9!==(int)$pages_count)): ?>
                <li class="pagination-item <?php if ((int)$_GET['page'] === (($key + 1) / 9)) {
                    print('pagination-item-active');
                } ?>">
                    <a href="lots-by-category.php?page=<?= ($key + 1) / 9 ?>&category_id=<?= $_GET['category_id'] ?>"><?= ($key + 1) / 9 ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        <li class="pagination-item <?php if ((int)$_GET['page'] === (int)$pages_count) {
            print('pagination-item-active');
        } ?>"><a href="lots-by-category.php?page=<?= $pages_count ?>&category_id=<?= $_GET['category_id'] ?>"><?= $pages_count ?></a></li>
        <?php if ((int)$_GET['page'] === (int)$pages_count): ?>
        <?php else: ?>
            <li class="pagination-item pagination-item-next"><a
                    href="lots-by-category.php?page=<?= $_GET['page'] + 1; ?>&category_id=<?= $_GET['category_id'] ?>">Вперед</a></li>
        <?php endif; ?>
    </ul>
</div>
