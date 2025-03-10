# yii2-kinoafisha

## Развертка приложения
1. Проверить в docker-compose.yml, что используемые порты свободны
2. В корневой директории запустить команду make init
3. В корневой директории запустить команду make composer-install(если возникает проблема с подключением к репозиториям есть возможность из директории /project запустить команду composer install)
4. В корневой директории запустить команду make app-init
5. В файле /project/common/config/main-local.php удалить настройку 'db'
6. В корневой директории запустить команду make data-init

Backend - localhost:8095
Frontend - localhost:8094
Вход в админку User: admin, Password: password_0


