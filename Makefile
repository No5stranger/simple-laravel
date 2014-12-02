build:
	@echo "---------building laravel---------"
	composer install
	chmod 777 -R ./app/storage

ctags:
	@echo "---------creating ctags--------"
	ctags -R --fields=+aimS --languages=php --php-kinds=cidf --exclude=tests --exclude=Tests --exclude=composer.phar
