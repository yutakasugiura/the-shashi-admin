## the-shashi-admin
### About
 - 概要：手作業更新が必要な煩雑な作業を、一部自動化したレポジトリ
 - 環境：ローカルでの動作が前提。なお、永続化にはDBを使用せず、全てJsonで取り扱う
 - 実装：node.js (typescript) & python3

### How to use
 - Setup for node.js
   ```
   1. git clone this repository
   2. node.js (ex. install by homebrew)
   3. command: npm run install
   ```
 - Edinetから上場企業一覧を取得する
    ```
    console command: ts-node app/ReadEdinetCodeList.ts
    ```

 - 上場企業一覧から、Jpx400に該当する会社を抽出する
    ```
    command: ts-node app/ReadJpx400List.ts
    ```

### Directory
```
root/
 ├ Auth/ //Auth0 検証環境（Non Framework by php7.x）
 ├ App/ //実行ファイル格納（Console Command）
 ├ Domain/ // ユースケースの実行ロジック
 ├ config/ // グローバル設定
 └ data/ // fileの読み書き
```
 
