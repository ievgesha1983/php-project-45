# установка Composer

install:
	composer install

# запуск Brain Games

brain-games:
	./bin/brain-games

# запуск Brain Game "Even Number"

brain-even:
	./bin/brain-even

# проверка проекта Composer'ом

validate:
	composer validate

# подключение CodeSniffer
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin