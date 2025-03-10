init: docker-down \
	docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up
rebuild: down docker-build-no-pull up

docker-up:
	cd project && docker compose up -d

docker-down:
	cd project && docker compose down --remove-orphans

docker-pull:
	cd project && docker compose pull

docker-build:
	cd project && docker compose build --pull

docker-build-no-pull:
	docker compose build

cli:
	cd project && docker compose run --rm php-cli bash

app-composer-install:
	cd project && docker compose run --rm php-cli composer install

app-init:
	cd project && docker compose run --rm php-cli php init

data-init: migrations fill-db copy-files

migrations:
	cd project && docker compose run --rm php-cli php yii migrate

fill-db:
	cd project && docker compose run --rm php-cli php yii fixture "*"

copy-files:
	cp pictures/* project/frontend/web/uploads
