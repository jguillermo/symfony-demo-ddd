Accounting
==========


# Docker Seed

## Install

```bash
$ ./scripts/tasks.build.sh
```

```bash
make start
```

```bash
$ ./scripts/tasks.migration.sh migrate
$ ./scripts/tasks.migration.sh generate
$ ./scripts/tasks.migration.sh status
```

```bash
make composer-update
```

```bash
./docker/scripts/tasks.console.sh doctrine:schema:update --force
```

```bash
./docker/scripts/tasks.console.sh generate:bundle --namespace=Persons/Infrastructure/Ui/PersonsBundle --format=annotation --dir=src --bundle-name=PersonsBundle --shared  --no-interaction
```

```bash
./docker/scripts/tasks.console.sh generate:bundle --namespace=Misa/Users/Infrastructure/Ui/UsersBundle --format=annotation --dir=src --bundle-name=UsersBundle --shared  --no-interaction
```

## Open
http://localhost:8085/

##ejecutar por problemas de acceso a solr
sudo chmod o+w -R solr


###borrar cache de git
```bash
git rm -rf --cached .
```
