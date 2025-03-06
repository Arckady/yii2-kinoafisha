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
                    ['label' => 'Список фильмов',  'icon' => 'video', 'url' => ['/'], 'target' => '_blank'],
                    ['label' => 'Список киносеансов',  'icon' => 'film', 'url' => ['/'], 'target' => '_blank'],
                    ['label' => 'Добавить фильм', 'icon' => 'plus', 'url' => ['/'], 'target' => '_blank'],
                    ['label' => 'Добавить киносеанс', 'icon' => 'plus', 'url' => ['/'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
    </div>
</aside>