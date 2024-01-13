<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>" class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <i aria-hidden="true" class="ti-angel-left"><?= lang('Pager.first') ?></i>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <i class="ti-angel-left" aria-hidden="false"><?= lang('Pager.previous') ?></i>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item" <?= $link['active'] ? 'class="active"' : '' ?>>
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <i aria-hidden="true" class="ti-angel-right"><?= lang('Pager.next') ?></i>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <i class="ti-angel-right" aria-hidden="false"><?= lang('Pager.last') ?></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>