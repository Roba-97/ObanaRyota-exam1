# お問合せフォーム

## 環境構築

### Docker環境構築(ビルド)
1. git clone　https://github.com/Roba-97/ObanaRyota-exam1
2. docker-compose up -d --build

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleをコピーし.envファイルを作成、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

＊手順3ではdocker-compose.ymlファイルのmysql:environmentを参照してDBへの接続設定をしてください<br>
　またsessionの保存をDBで行っているためSESSION_DRIVERにはdatabaseを設定してください

＊開発環境にアクセスした際に「The stream or file "/var/www/storage/logs/laravel.log" could not be opened in append mode　･･･」<br>
　のようなエラーが発生した場合は、以下のコマンドでディレクトリ権限を変更した後、キャッシュクリアを実行してみてください
1. sudo chmod 777 -R src/*
2. php artisan cache:clear
3. php artisan config:clear
4. php artisan config:cache


## 使用技術(実行環境)
- PHP 7.4.9
- Laravel Framework 8.83.8
- mysql:8.0.26
- nginx:1.21.1

## ER図
![ER図](/src/er_graph.drawio.png)

## URL
- 開発環境 : 127.0.0.1 (localhost)
- phpMyAdmin : 127.0.0.1:8080 (localhost:8080)
