<?php

/* @var $this yii\web\View */

$this->title = 'taxiblog';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Тестовое задание!</h1>

        <p class="lead">Блог Taxiblog</p>
        <p>
          Для начала работы запустите миграции БД (команда "yii migrate" в консоли) и запустите команду add-users из SiteController (например, "http://dev-blog/taxiblog/web/index.php?r=site/add-users")
        </p>
        <p>
          Это создаст тестовых пользователей:
        </p>
        <p>
          <ul>
            <li>
              deleted:deleted - заблокированный пользователь
            </li>
            <li>
              admin:admin - администратор
            </li>
            <li>
              author:author - автор. может постить посты
            </li>
            <li>
              user:user - пользователь "обычный", не может постить. можно использовать, например, для тех, кто не подтвердил свой профиль(если реализовывать подобный функционал)
            </li>
          </ul>
        </p>

        <p><a class="btn btn-lg btn-success" href="index.php?r=post">Начать работу</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Статьи</h2>

                <p>Автор - может писать новые и редактировать свои статьи</p>
                <p>Авторизованный пользователь может писать новые статьи</p>
                <p>Не авторизованный пользователь может писать комментарии и просматривать статьи.</p>

                <p><a class="btn btn-default" href="index.php?r=post">Список статей &raquo;</a></p>

            </div>
            <div class="col-lg-4">
                <h2>Комментарии</h2>

                <p>Их можно оставлять под просматриваемыми постами. Список комментариев отдельно можно посмотреть, нажав кнопку ниже</p>

                <p><a class="btn btn-default" href="index.php?r=comment">Список комментариев &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Не реализовано</h2>

                <p>Не было в ТЗ, но теоретически возможно</p>

                <ul>
                  <li>
                    "Подтверждение" пользователя по email
                  </li>
                  <li>
                    Личный кабинет (Сейчас есть только регистрация/авторизация)
                  </li>
                  <li>
                    Валидация действий на уровне behaviour-ов (Сейчас есть на уровне форм)
                  </li>
                </ul>

                <p><a class="btn btn-default" href="https://pastebin.com/kb5J8pLG">Текст задания (Pastebin) &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
