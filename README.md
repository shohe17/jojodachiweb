# ジョジョ立ち投稿サイト

## 作成した経緯
- 有名なSNSに自分のジョジョ立ちを投稿するのに抵抗がある人もいるのではないかと思い
  見れる対象がジョジョに興味ある、もしくは好きな人だけに絞ったWebアプリを作成しました。
  
## 機能一覧
- 基本的なCRUD機能と、認証、いいね、フォロー、コメント機能を追加しています。
  - 一覧表示（ユーザーの全ての投稿を降順表示）
  - 投稿（画像とタイトル）
    - 以下のバリデーションを実装する
      - 入力必須（image, title）
      - 150文字以内(title)
      - 画像（jpeg,png,jpg,gif）
  - 編集（自分の投稿のtitleを編集できる）
    - 以下のバリデーションを実装する
      - 入力必須
      - 150文字以内(title)
  - 削除（自分の投稿の削除ができる）
  - 認証機能
    - サインアップ機能
    - サインイン機能
    - サインアウト機能
  - いいね（投稿にいいねができる）
  - コメント（投稿にコメントができる）
    - 以下のバリデーションを実装する
      - 100文字以内（comment）
  - フォロー（ユーザーにフォローができる）
  - 投稿（プロフィール画像と紹介文を追加できる）
    - 以下のバリデーションを実装する
      - 画像（jpeg,png,jpg,gif）
      - 紹介文200文字以内（biography）

## 画面遷移図

## ER図

## 使用してる技術
- PHP8.0
- MySQL5.7
- Cequel Ace

## 本番URL

## 環境構築手順

1. リポジトリをクローン
```
git clone https://github.com/shohe17/jojodachiweb
```

2. dockerコンテナを起動
```
cd docker
docker-compose up —-build -d
```

3. 必要なライブラリのインストール
```
docker-compose exec php /bin/bash

composer install
```

4. ブラウザからアクセス
```
http://127.0.0.1/
http://127.0.0.1:8000/
```

### その他
- sequel aceを利用する場合
```
アプリのダウンロード
ID: root
PW: P@ssw0rd
```

- docker停止
```
cd docker
docker-compose down
```

<!-- - ライブラリの導入
  1. phpのコンテナに入る
  ```
  docker-compose exec php /bin/bash
  ```

  2. composerを使用してインストール
  ```
  composer require {Owner/Library}
  ``` -->
