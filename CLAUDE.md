# narita プロジェクト開発ガイド（Claude向け）

## 概要

成田機材株式会社の公式コーポレートサイト。
**PHP 8.2 + Apache + MySQL 8.0**。ローカル開発は Docker、本番はさくらインターネット共用ホスティング。
GitHub master ブランチへ push すると GitHub Actions（rsync）で自動デプロイされる。

フロントは Vanilla JS + CSS 変数。フレームワーク・npmは不使用。

---

## 1. ディレクトリ構成

```
narita/
├── parts/              # 共通パーツ（全ページでinclude）
│   ├── head.php        # <head> + OGP + Google Fonts
│   ├── header.php      # グローバルナビ + ハンバーガーボタン
│   ├── fullmenu.php    # フルスクリーンハンバーガーメニュー
│   ├── footer.php      # フッター + SNSリンク
│   └── scripts.php     # グローバルJS（ローダー, カーソル, スクロールアニメ等）
├── assets/
│   ├── css/style.css   # 統一スタイルシート（CSS変数でカラー管理）
│   ├── img/            # logo/, company/, products/, makers/, svg/, video/, 404/
├── edit/               # 管理画面（ログイン + ニュースCRUD）
├── docker/mysql/init/  # DBスキーマ + メーカー初期データ
├── db.php              # PDO接続 + ユーティリティ関数
├── config.secret.php   # reCAPTCHAシークレットキー（.gitignore済み）
└── .github/workflows/deploy.yml  # GitHub Actions 自動デプロイ
```

### メインページ一覧

| ファイル | 内容 |
|---------|------|
| index.php | ホーム（ニュース5件取得, ビデオヒーロー） |
| company.php | 会社概要 |
| president.php | 代表ご挨拶（フリップカード + Xタイムライン） |
| history.php | 会社沿革 |
| executive.php | 役員紹介 |
| associate.php | 関連会社 |
| access.php | アクセス（2営業所の地図・写真） |
| products.php | 商品カテゴリ（12カテゴリ） |
| makers.php | 取り扱いメーカー（あかさたな索引 + DBから取得） |
| news.php | ニュース一覧（カテゴリフィルター） |
| recruit.php | 採用情報 |
| contact.php | お問い合わせフォーム |
| contact-send.php | フォーム送信処理（スパム対策） |
| 404.php | カスタム404ページ |

---

## 2. データベース

### 接続（db.php）

```php
// 環境変数が設定されていればそちらを優先（Docker対応）
define('DB_HOST', getenv('DB_HOST') ?: 'mysql80.narita-kizai.sakura.ne.jp');
define('DB_NAME', getenv('DB_NAME') ?: 'narita-kizai_db');
define('DB_USER', getenv('DB_USER') ?: 'narita-kizai_db');
define('DB_PASS', getenv('DB_PASS') ?: '...');

// 取得方法
$pdo = db(); // シングルトン、失敗時は null
```

ユーティリティ関数：
- `e($s)` → `htmlspecialchars()` のラッパー
- `formatDate($d)` → 日付フォーマット

### テーブル構造

**news**（ニュース記事）
- `id, title, excerpt, image(URL), category, link_url, link_external(0/1), published_at, created_at, updated_at`

**news_categories**（カテゴリマスタ）
- `id, name, sort_order`

**makers**（取り扱いメーカー）
- `id, row_group('あ行'/'か行'/../'アルファベット'), kana_group('あ'/'い'/..), name, url, sort_order`

---

## 3. ページのテンプレート構造

すべてのページは以下の構成：

```php
<?php
$pageTitle = 'ページタイトル';
$currentPage = 'menu-id'; // header.php でナビのアクティブ判定に使用
include 'parts/head.php';
?>
<body class="inner-page"> <!-- トップページは class なし -->
<?php include 'parts/header.php'; ?>
<?php include 'parts/fullmenu.php'; ?>

<main>
  <div class="page-hero"> ... </div>
  <div class="content-area"> ... </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
```

`$currentPage` の値はナビの `data-page` 属性と対応している。

---

## 4. スタイル・デザイン

### カラーパレット（style.css CSS変数）

```css
--navy:   #1a2744;  /* ブランド色（濃紺） */
--accent: #c8a95a;  /* ゴールド */
--gray1:  #f7f7f5;
--gray2:  #eeede9;
--gray3:  #888880;
--gray4:  #444440;
```

### フォント

- Serif: Noto Serif JP（本文・見出し）
- Sans: Noto Sans JP
- Display: Bebas Neue（英字アクセント・大見出し）

### アイコン

外部アイコンライブラリは使用していない。SVGを直接使うか、テキスト・CSS装飾で代替。

---

## 5. お問い合わせフォームのスパム対策

4層構成（contact.php + contact-send.php）。

| 順番 | 対策 | 概要 |
|------|------|------|
| 1 | **Google reCAPTCHA v3** | スコア 0.5 未満はボット判定。サイトキーはcontact.phpに直書き（公開値なのでOK） |
| 2 | **ハニーポット** | 非表示の `name="website"` フィールドが埋まっていたらボット判定 |
| 3 | **IPレートリミット** | 同一IPから1時間に3件超で拒否。`/tmp/narita_contact_{md5(ip)}.json` に記録 |
| 4 | **送信時間チェック** | フォーム表示からの経過時間が3秒未満または1時間超で拒否（セッション使用） |
| 5 | **URLスパム検出** | 名前+会社名+本文にURLが2件以上あれば拒否 |

### reCAPTCHA キー管理

- **サイトキー**（公開）: contact.php に直書き（2箇所）
- **シークレットキー**（秘密）: `config.secret.php` に記述、`.gitignore` で除外

```php
// config.secret.php（Gitに含まれない）
define('RECAPTCHA_SECRET', 'xxxxx...');

// contact-send.php
require_once __DIR__ . '/config.secret.php';
// → RECAPTCHA_SECRET 定数として参照
```

**`config.secret.php` はGitHubに上がらないため、本番サーバーにはFTPで手動配置が必要。**
GitHub Actions の rsync で上書きされることはないが、新規デプロイ時は忘れず配置すること。

---

## 6. 管理画面（edit/）

- URL: `/edit/`
- 認証: シンプルなパスワード（`ADMIN_PASSWORD` 定数、`hash_equals()` で比較）
- セッション: ログイン後 `$_SESSION['admin'] = true` + `session_regenerate_id(true)`
- CSRF対策: セッションのワンタイムトークン

### ニュース管理

`edit/news.php` で CRUD 全操作。カテゴリの新規作成・削除もここで行う。

---

## 7. メーカー一覧（makers.php）

- DBの `makers` テーブルから `row_group` 別に取得
- メーカーロゴの優先順位:
  1. `/assets/img/makers/{id}.png` または `.jpg`（ローカルファイル）
  2. Google Favicon API（`https://www.google.com/s2/favicons?sz=64&domain=...`）
  3. `noimage.svg`（デフォルト）

---

## 8. 本番デプロイ

### 自動デプロイ（通常の変更）

```
git push origin master
→ GitHub Actions（rsync）→ さくらインターネット本番サーバー
```

除外されるファイル: `.git/`, `.github/`, `Dockerfile`, `docker-compose.yml`
`config.secret.php` は `.gitignore` 除外なので rsync されない（本番の既存ファイルはそのまま残る）。

### シークレットキーを変更した場合

Google reCAPTCHA の管理コンソールでキーを再生成したら：
1. `config.secret.php` を新しいシークレットキーで更新
2. FTPで本番サーバーの同パスに手動アップロード
3. contact.php のサイトキー（2箇所）を新しいサイトキーに変更してpush

---

## 9. ローカル開発

```bash
docker-compose up -d

# アクセス先
# サイト:       http://localhost:8080
# 管理画面:     http://localhost:8080/edit/
# phpMyAdmin:   http://localhost:8081  (user: narita / pass: narita)
```

DB初期化は `docker/mysql/init/` の SQL が自動実行される。
コンテナを `down -v` で消すと DB もリセットされる。

---

## 10. セキュリティ注意事項

- `db.php` に DB パスワードと管理画面パスワードが平文で書かれているため、**このファイルは絶対に公開リポジトリに上げないこと**（現状 private リポジトリなら問題なし）
- `.htaccess` で `/wp-login.php` へのアクセスをリダイレクト済み（ WordPress スキャンボット対策）
- HTTPS は `.htaccess` で強制（localhost は除外）

---

## 11. Edit/Write ツール使用時の注意

`Edit` ツールを使う前に必ず `Read` ツールでファイルを読み込む。
読み込み前に `Edit` すると「File has not been read yet」エラーが発生する。
