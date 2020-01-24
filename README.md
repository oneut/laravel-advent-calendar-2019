# Laravelで複雑性と戦うためのTips

## 概要
ControllerはHomeControllerのみです。

## 開発環境構築
### コンテナ起動
※Dockerを必要とします。

```sh
cd laravel-advent-calendar-2019
cp .env.example .env
docker-compose up -d --build
```

### Composer install
```
docker-compose exec php composer install
```

### Generate key
```
docker-compose exec php php artisan key:generate
```

### Migration & Seeder
```
docker-compose exec php php artisan migrate:refresh --seed
```

## アクセス
[http://localhost/](http://localhost/)
