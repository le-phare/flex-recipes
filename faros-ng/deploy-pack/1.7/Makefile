SF = docker compose run --rm php bin/console
COMPOSER = docker compose run --rm php composer
NPM = $(DOCKER) node:lts npm

start: install
	docker compose up -d
	$(SF) do:mi:mi -n

include ansible/Makefile.mk

.PHONY: start install build watch

clean:
	rm var/database/*.dump

install:
	$(COMPOSER) install --quiet &\
	$(NPM) ci

build:
	$(NPM) run build

watch:
	$(NPM) run watch
