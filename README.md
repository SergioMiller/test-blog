## Процесс установки:

1. Создаем и запускаем контейнеры докера 
    *  `docker-compose up -d`
2. После успешного выполнения заходим в контейнер php 
    * `docker exec -it php bash`
3. Устанавливаем зависимости
    * `composer install`
4. Поднимаем миграции
    * `php artisan migrate`
6. Создаем симлинк
    * `php artisan storage:link`
7. Проверяем работу сайта по адресу `http://localhost/8000`
6. Если нужно сбилдить фронт
    * `npm install`
    * `npm build dev`, `npm build prod`
    
## Соединение с базой данных    
    
* Пример подключения к базе данных mysql в `.env` файле
```
DB_CONNECTION=mysql
DB_HOST=m-mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=root
DB_PASSWORD=root
```

## Подключение дополнительных библиотек для php
Добавить дополнительные библиотеки вы можете в файле `./docker/php-fpm/Dockerfile.`

Для упрощения процеса поиска нужных библиотек в файле присудствуют
 закомментированные библиотеки, для их разблокировки необходимо удалить `#` в начале строки.

После изменения файла Dockerfile необходимо запустить скрипт `docker-compose build php`

## Редактирование php.ini
По умолчанию docker сам соберет конфиг php.ini из тех екстеншинов которые
 описаны в `./docker/php-fpm/Dockerfile.` Если вы хотите изменить какие то
  настройки или дополнить вы можете редактировать файл `./docker/php-fpm/config/php.ini`

## Настройки Nginx
Для добавления новых хостов вам необходимо создать новый файл в директории
 `./docker/nginx/` по примеру `./docker/nginx/conf.d/default.conf.`
 
Если вам необходимо включить поддержку https вы можете раскомментировать
ssl настройки в файле `./docker/nginx/conf.d/default.conf,` после чего
загрузить файлы сертификатов в папку `./docker/nginx/certs/`

## Хосты
В контейнерах для подключения к какому то сервису нужно использовать
его `container_name` в качестве хоста

Примеры:
 * mysql = mysql
 * nginx = nginx
 * apache = apache
 * php = php

 ## Ссылки
 * `http://localhost:8000/` - страница приложения
 * `http://localhost:8080/` - PhpMyAdmin
 
 ## Полезные комманды для работы с docker
 *  `docker-compose exec -it CONTAINER_NAME bash` зайти в bash контейнера по его имени
 *  `docker-compose start` запуск сгенерированных контейнеров
 *  `docker-compose stop` остановка сгенерированных контейнеров
 *  `docker-compose up -d` стоит запускать только для создания контейнеров
 *  `docker-compose down` удаление сгенерированных контейнеров и их сети
 *  `docker-compose build` запускать при изменения файла Dockerfile, для ребилка контейнера
 *  `docker-compose ps` проверка состояния контейнеров в текущей директории
 *  `docker ps` список активных контейнеров
 
