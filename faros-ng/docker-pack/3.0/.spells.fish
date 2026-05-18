#!/usr/bin/env fish

function _docker_exec
    docker exec -it -u $(id -u):$(id -g) $argv
end

function _docker_run
    docker run --init --rm -it -u $(id -u):$(id -g) $argv
end

function _docker_compose_exec
    docker compose exec -it -u $(id -u):$(id -g) $argv
end

function _docker_compose_run
    docker compose run --rm -it -u $(id -u):$(id -g) $argv
end

function _docker_compose_run_php
    set -q COMPOSER_HOME; or set -l COMPOSER_HOME $HOME/.composer
    _docker_compose_run -v "$COMPOSER_HOME:/tmp/composer" -e COMPOSER_HOME=/tmp/composer php $argv
end

function _docker_run_node
    set -q npm_config_cache; or set -l npm_config_cache $HOME/.npm
    set -q npm_config_userconfig; or set -l npm_config_userconfig $HOME/.npmrc
    touch "$HOME/.npmrc"
    _docker_run -e "HOME=/home/node" -v "$PWD:/app" -v "$npm_config_cache:/home/node/.npm" -v "$npm_config_userconfig:/home/node/.npmrc" -w /app node:24-slim $argv
end

function composer
    _docker_compose_run_php php /usr/local/bin/composer $argv
end

function npm
    _docker_run_node npm $argv
end

function npx
    _docker_run_node npx $argv
end

function php
    _docker_compose_run_php php $argv
end

function sf
    _docker_compose_run_php php bin/console $argv
end
