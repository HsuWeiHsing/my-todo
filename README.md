# To do アプリ

## アプリURL
https://my-todo-sigma-two.vercel.app/

### テストアカウント
~~~
メールアドレス：test@example.com
パスワード：12345678
~~~

## 使用技術一覧
* Laravel
* PHP
* CSS
* MYSQL
* Tailwind CSS

## アプリ機能一覧
* 会員新規登録＆ログイン
* タスクの追加
* タスクの編集
* ステータス/重要度/緊急度/デットライン
* タスクの削除
* ページネーション

## 今後の実装予定
* フィルター機能
* コメント機能

## 開発環境
* Windows 11
* Laravel Framework 10.48.25
* PHP 8.2.27
* Laravel Sail
* Docker Desktop

### その他
* PHPMyAdmin
* VSCode
* GitHub

## データベース設計

* ER図
![alt text](image-1.png)



















1. git clone
~~~
git clone ~~~
~~~
2. 環境変数ファイルの作成

clone したディレクトリへ移動
~~~
cd ~~~
cp .env.example .env
~~~
3. composer install
~~~
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
composer --version
~~~
4. APP_KEYの生成
~~~
php artisan key:generate
~~~
5. フロントパッケージインストール
~~~
npm install
npm run dev
~~~
6. ローカルサーバー起動
~~~
php artisan serve
~~~
7. マイグレーション
~~~
php artisan migrate
~~~
8. シーダー実行
~~~
php artisan db:seed
~~~