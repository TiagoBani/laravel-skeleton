# laravel-skeleton

## install php dependencies

```bash
docker run --rm -it --volume $PWD/src:/app composer install
```

## install node dependencies when use vuejs

```bash
docker-compose exec app npm i
```

## alter database connection in .env 

copy src/.env.example to src/.env

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=preview
DB_PASSWORD=secret
```

## install php key

```bash
docker-compose exec app php artisan key:generate
```

## commands

start 

```bash
docker-compose up
```

start daemon mode

```bash
docker-compose up -d
```

start rebuild images

```bash
docker-compose up --build
```

down

```bash
docker-compose down
```