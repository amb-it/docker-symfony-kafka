DC=docker-compose

help:
	@echo '--------------------'
	@echo "\033[32mAvailable commands:\033[0m"
	@echo '--------------------'
	@echo "make up"
	@echo "make down"
	@echo "make enter-php-container"

up:
	cd docker && $(DC) up -d

down:
	cd docker && $(DC) down

enter-php-container:
	docker exec -ti php_fpm_container bash