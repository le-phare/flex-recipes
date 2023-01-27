## =============================================================================
##
##                        NE PAS MODIFIER CE FICHIER !
##
##              /!\  Ce Makefile à pour objectif d'être générique !
##
## =============================================================================
remote ?= preprod
REMOTE ?= $(remote)

application ?= app
APPLICATION ?= $(application)

UNAME_S := $(shell uname -s)
ifneq ($(UNAME_S),Darwin)
	DOCKER_USER=-u $(shell id -u):$(shell id -g)
	ANSIBLE_VOLUMES=-v $(HOME)/.ssh/config:/home/ansible/.ssh/config:ro \
		-v $(HOME)/.ssh/known_hosts:/home/ansible/.ssh/known_hosts
else
	ANSIBLE_VOLUMES=-v $(HOME)/.ssh:/home/ansible/.ssh:ro
endif

DOCKER = docker run --rm -i -t $(DOCKER_USER) -v $(shell pwd):/app -w /app
mkfile_path := $(abspath $(lastword $(MAKEFILE_LIST)))
current_dir := $(notdir $(patsubst %/,%,$(dir $(mkfile_path))))
ansible_vars := $(current_dir)/$(REMOTE)/group_vars/$(APPLICATION)/vars

REMOTE_SSH_USER = $(shell awk -F': ' '/ansible_user/ { print $$2 }' $(ansible_vars))
REMOTE_SSH_HOST = $(shell awk -F': ' '/ansible_host/ { print $$2 }' $(ansible_vars))
REMOTE_DIRECTORY = $(shell awk -F': ' '/ansistrano_deploy_to/ { print $$2 }' $(ansible_vars))
REMOTE_SSH_PORT = $(shell awk -F': ' '/ansible_port/ { print $$2 }' $(ansible_vars))
REMOTE_SSH = $(REMOTE_SSH_USER)@$(REMOTE_SSH_HOST) -p $(REMOTE_SSH_PORT)

database_container := $(shell awk -F': ' '/db_pull_local_database_host/ { print $$2 }' $(current_dir)/database.yml | xargs -I{} docker ps -fname={} -q)
database_network := $(shell docker inspect $(database_container) -f {{.HostConfig.NetworkMode}})

DOCKER_NETWORKS = $(addprefix --network ,$(database_network))

ANSIBLE_IMAGE ?= lephare/ansible:latest
ANSIBLE_VAULT_FILE = ~/.ansible/password/$(notdir $(abspath .)).txt
ANSIBLE_STDOUT_CALLBACK ?= default
ANSIBLE_PIPELINING ?= 0
ANSIBLE_OPTION ?=
ANSIBLE_ENV = $(DOCKER) \
	-v $(dir $(ANSIBLE_VAULT_FILE)):/tmp/ansible:ro \
	-v $(SSH_AUTH_SOCK):/ssh-agent \
    $(ANSIBLE_VOLUMES) \
	$(DOCKER_NETWORKS) \
	-e SSH_AUTH_SOCK=/ssh-agent \
	-e ANSIBLE_VAULT_PASSWORD_FILE=/tmp/ansible/$(notdir $(ANSIBLE_VAULT_FILE)) \
	-e ANSIBLE_STDOUT_CALLBACK=$(ANSIBLE_STDOUT_CALLBACK) \
	-e ANSIBLE_PIPELINING=$(ANSIBLE_PIPELINING) \
	$(ANSIBLE_IMAGE)

ANSIBLE= $(ANSIBLE_ENV) ansible $(ANSIBLE_OPTION)
VAULT= $(ANSIBLE_ENV) ansible-vault $(ANSIBLE_OPTION)
PLAYBOOK= $(ANSIBLE_ENV) ansible-playbook $(ANSIBLE_OPTION)

# Get the list of playbooks
PLAYBOOKS = $(basename $(patsubst %/,%,$(sort $(notdir $(wildcard $(current_dir)/*.yml)))))

facts:
	$(ANSIBLE) all --inventory-file=$(current_dir)/$(REMOTE)/hosts --module-name=setup

vault-encrypt:
	$(VAULT) encrypt $(current_dir)/$(REMOTE)/group_vars/$(APPLICATION)/vault

vault-decrypt:
	$(VAULT) decrypt $(current_dir)/$(REMOTE)/group_vars/$(APPLICATION)/vault

$(PLAYBOOKS):
	$(PLAYBOOK) --inventory-file=$(current_dir)/$(REMOTE)/hosts $(current_dir)/$@.yml

ssh:
	ssh -t $(REMOTE_SSH) 'cd $(REMOTE_DIRECTORY); bash --login'
