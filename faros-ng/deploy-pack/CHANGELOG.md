# Change Log

## 1.2 (2021-11-18)

### Notable changes

- update makefile to use 22 as the default ssh port
- lookup local database host in the _variables.yml instead of group_vars
- enable pipeline by default but allow to disable using environment variable

## 1.1 (2021-04-23)

### Bug Fixes

- Fix macOs permission issue with ssh mount

## 1.0 (2021-04-23)

### Notable changes

First major version change

### Breaking changes

- "production" environment has been renamed "prod" to use same env as the application
- "project.yml" has been renamed "_variables.yml"

### Features

- Makefile is provided setup the base framework to deal with deployments and application lifecycle
