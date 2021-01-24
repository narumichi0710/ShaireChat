# ShaireChat
 美容室のフリマサイトです。<br>
 使わなくなった物を他の美容室の誰かにあげたり、探している物を無料でもらえたり出来ます。<br>
 レスポンシブ対応しているのでスマホからもご確認いただけます。
 
# URL
http://shairechat.com/<br>
画面上部のゲストログインボタンからメールアドレスとパスワードを入力せずにログインできます。

# 環境
- PHP 7.4.9
- Laravel 8.2.0
- Vue.js 2.5.17
- MySQL 5.7.26
- Apache
- AWS
  - VPC
  - EC2
  - RDS
  - Route53

## Installation

$ git clone https://github.com/narumichi0710/Shairechat.git

$ docker-compose up -d

- コンテナの中に入る
$ docker-compose exec web bash

- composerをインストール、アップデート
$ composer install

$ composer update

- 途中
（データベースをすぐ持ってこれる様にする）

- キーの設定
$ php artisan key:generate

- ルーティングの設定（もしルートエラーになる場合

$ ls /etc/apache2/mods-enabled/

$ a2enmod rewrite

- 再起動後rewrite.loadがあるか確認


- アクセスできるか確認
http://localhost:8080/ 





# 機能一覧
- ユーザー登録、ログイン機能
- 投稿機能
  - 画像投稿
- お気に入り機能
- コメント機能
- ページネーション機能
- 絞り込み検索機能


  <img width="1262" alt="Screen Shot 0002-10-20 at 19 51 33" src="https://user-images.githubusercontent.com/65114797/96578017-7d25d280-130f-11eb-982c-d7a086fb7e5c.png">
<br>

<img width="456" alt="Screen Shot 0002-10-20 at 19 59 19" src="https://user-images.githubusercontent.com/65114797/96578895-ea863300-1310-11eb-80c6-887d5fb46ad8.png">

# AWS構成図
<img width="756" alt="Screen Shot 0002-10-20 at 19 22 42" src="https://user-images.githubusercontent.com/65114797/96574295-37b2d680-130a-11eb-9c5d-f80e6394f843.png">

