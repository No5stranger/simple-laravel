build:
	@echo "---------building laravel---------"
	composer install
	chmod 777 -R ./app/storage
