.DEFAULT_GOAL := help

install: ## Install project
	./script.sh install

build: ## build image, usage: make build, make build image=nginx
	./script.sh build ${image}

start: ## Up docker containers, usage: make up
	./script.sh start

stop: ## Stops and removes the docker containers, usage: make down
	./script.sh stop

restart: ## Restart all containers, usage: make restart
	docker-compose restart

status: ## Show containers status, usage: make status
	docker-compose ps

composer-require: ## Install composer dependency, usage: make composer req=symfony/dotenv
	./script.sh composer require ${req}

composer-update: ## Update composer dependencies
	./script.sh composer update

router: ## execute symfony php bin/console
	./script.sh console debug:router

ssh: ## Enter ssh container, usage : make ssh container=nginx
	docker run -ti ${container} sh

push: ## Push all images to registry
	./script.sh push

pull: ## Pull all images from registry
	./script.sh pull

build-db: ## Pull all images from registry
	./script.sh builddb

test: ## Execute integration test
	./script.sh test

cache: ## Pull all images from registry
	./script.sh composer cache:clear

cs: ## add permission folder var
	./script.sh composer cs

cs-fix: ## add permission folder var
	./script.sh composer cs-fix

clean: ## Clear containers
	docker container prune -f ; \
	docker image prune -f ; \
	docker network prune -f ; \
	docker volume prune -f;

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'
