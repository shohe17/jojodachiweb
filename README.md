# ジョジョ立ち投稿サイト

## 作成した経緯

## 機能一覧
- 投稿の作成ができる
  - 画像の投稿ができる
  - 以下のバリデーションを実装する
    - 入力必須
    - 100文字以内(title)
- 投稿の編集ができる
  - 以下のバリデーションを実装する
  - 入力必須
  - 100文字以内(title)
  - タスクの削除ができる
- 投稿の削除ができる
- 認証機能がある
  - サインアップ機能
  - サインイン機能
  - サインアウト機能
## 画面遷移図

## ER図

## 使用してる技術
- PHP8.0
- MySQL5.7

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
```

### その他
- sequel aceを利用する場合
```
アプリのダウンロード
ID: root
PW: secret
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
