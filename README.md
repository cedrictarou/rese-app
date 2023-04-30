# Rese

## 概要説明

-   飲食店の予約をすることができる
-   飲食店の評価をすることがきる

## 作成した目的

-   お客様が簡単に飲食店の予約をできるようにするため
-   お店側の予約管理をかんたんにするため

## アプリケーション URL

-   http://ec2-54-92-112-39.ap-northeast-1.compute.amazonaws.com/

## 他のリポジトリ

-   https://github.com/cedrictarou/rese-app

## 機能一覧

-   会員登録
-   ログイン
-   ログアウト
-   ユーザー情報取得
-   ユーザー飲食店お気に入り一覧取得
-   ユーザー飲食店予約情報取得
-   飲食店一覧取得 未ログインでも可能
-   飲食店詳細取得 未ログインでも可能
-   飲食店お気に入り追加
-   飲食店お気に入り削除
-   飲食店予約情報追加
-   飲食店予約情報削除
-   飲食店予約変更機能
-   エリアで検索する 未ログインでも可能
-   ジャンルで検索する 未ログインでも可能
-   店名で検索する 未ログインでも可能
-   飲食店評価機能

## 使用技術（実行環境）

-   laravel8
-   laravel mix
-   typescript5
-   tailwind3
-   aws

## テーブル設計

### Users テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| name       | string          |             |            | ○        |             |
| email      | string          |             | ○          | ○        |             |
| password   | string          |             |            | ○        |             |
| role_id    | foreignId       |             | ○          | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

### Shops テーブル

| カラム名    | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ----------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id          | unsigned bigint | ○           |            | ○        |             |
| name        | string          |             |            | ○        |             |
| region_id   | foreignId       |             | ○          | ○        |             |
| genre_id    | foreignId       |             | ○          | ○        |             |
| description | text            |             |            | ○        |             |
| image       | string          |             |            |          |             |
| review_id   | foreignId       |             |            | ○        |             |
| created_at  | timestamp       |             |            |          |             |
| updated_at  | timestamp       |             |            |          |             |

### Reserves テーブル

| カラム名      | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ------------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id            | unsigned bigint | ○           |            | ○        |             |
| user_id       | foreignId       |             | ○          | ○        |             |
| shop_id       | foreignId       |             | ○          | ○        |             |
| date_time     | dateTime        |             |            | ○        |             |
| num_of_people | integer         |             |            | ○        |             |
| status        | tinyint         |             |            | ○        |             |
| created_at    | timestamp       |             |            |          |             |
| updated_at    | timestamp       |             |            |          |             |

### Regions テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| region     | string          |             |            | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

### Genres テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| name       | string          |             |            | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

### Likes テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| user_id    | foreignId       |             | ○          | ○        |             |
| shop_id    | foreignId       |             | ○          | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

### Reviews テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| reserve_id | foreignId       |             | ○          | ○        |             |
| rating     | tinyInteger     |             |            | ○        |             |
| comment    | text            |             |            | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

### Roles テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| ---------- | --------------- | ----------- | ---------- | -------- | ----------- |
| id         | unsigned bigint | ○           |            | ○        |             |
| name       | string          |             |            | ○        |             |
| created_at | timestamp       |             |            |          |             |
| updated_at | timestamp       |             |            |          |             |

## ER 図

-   index.drawio.png を参照

## 環境構築

### 1\. Docker のインストール

まずは、Docker をインストールしてください。Docker は以下のリンクからダウンロードできます。

[https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)

### 2\. Laravel Sail のインストール

Laravel Sail をインストールするために、以下のコマンドを実行します。

`composer install`

### 3\. .env ファイルの設定

リポジトリーには、`.env.example`というファイルが含まれています。このファイルをコピーして、`.env`という名前で保存してください。

`cp .env.example .env`

`.env`ファイルをエディタで開き、以下の設定を変更してください。

```
DB_PORT=3306
DB_DATABASE=rese-app
DB_USERNAME=rese-app
DB_PASSWORD=password

APP_PORT=8000
PHPMYADMIN_PORT=8888
MIX_PORT=3000
```

### 4\. Docker コンテナの起動

Docker コンテナを起動するために、以下のコマンドを実行してください。

`./vendor/bin/sail up -d`

### 5\. マイグレーションとシーディング

Docker コンテナが起動したら、以下のコマンドでマイグレーションとシーディングを実行してください。

`./vendor/bin/sail artisan migrate ./vendor/bin/sail artisan db:seed`

以上で、環境構築が完了しました。アプリケーションを起動するためには、ブラウザで `http://localhost` にアクセスしてください。

## その他

### テストアカウント

#### 店舗管理者テストアカウント

| account  | shop-admin1           |
| -------- | --------------------- |
| email    | shop-admin1@email.com |
| password | password123           |

| account  | shop-admin2           |
| -------- | --------------------- |
| email    | shop-admin2@email.com |
| password | password123           |

#### アプリ管理者テストアカウント

| account  | admin           |
| -------- | --------------- |
| email    | admin@email.com |
| password | password123     |
