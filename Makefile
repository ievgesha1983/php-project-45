# установка Composer

install:
	composer install

# запуск Brain Games

brain-games:
	./bin/brain-games

# запуск Brain Game "Even"

brain-even:
	./bin/brain-even

# запуск Brain Game "Calc"

brain-calc:
	./bin/brain-calc

# проверка проекта Composer'ом

validate:
	composer validate

# подключение CodeSniffer
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin