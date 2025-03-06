<?php

use hail812\adminlte\widgets\Menu;

/* @var $assetDir false|string */

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            echo Menu::widget([
                'items' => [
                    ['label' => 'Панель навигации ', 'header' => true],
                    ['label' => 'Список фильмов',  'icon' => 'video', 'url' => ['/']],
                    ['label' => 'Список киносеансов',  'icon' => 'film', 'url' => ['/']],
                    ['label' => 'Добавить фильм', 'icon' => 'plus', 'url' => ['/film/create']],
                    ['label' => 'Добавить киносеанс', 'icon' => 'plus', 'url' => ['/']],
                ],
            ]);
            ?>
        </nav>
    </div>
</aside>