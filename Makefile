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

# запуск Brain Game "GCD"

brain-gcd:
	./bin/brain-gcd

# запуск Brain Game "Progression"

brain-progression:
	./bin/brain-progression

# проверка проекта Composer'ом

validate:
	composer validate

# подключение CodeSniffer
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin