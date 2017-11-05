Accounting
==========


# Docker Seed

## Install

```bash
$ ./scripts/tasks.build.sh
```

```bash
make install
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
./script console generate:bundle --namespace=Misa/DomainName/Infrastructure/Ui/DomainNameBundle --format=annotation --dir=src --bundle-name=DomainNameBundle --shared  --no-interaction
```

## Open
http://localhost:8085/

##ejecutar por problemas de acceso a solr
sudo chmod o+w -R solr


###borrar cache de git
```bash
git rm -rf --cached .
```
