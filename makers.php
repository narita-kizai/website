<?php
$pageTitle   = '取り扱いメーカー';
$currentPage = 'makers';
require_once __DIR__.'/db.php';

// ─── 画像ソース（カスタムロゴ優先 → Googleファビコン） ──
function makerImgSrc(int $id, string $url): string {
    foreach (['png','jpg','jpeg','webp','gif'] as $ext) {
        if (file_exists(__DIR__."/assets/img/makers/{$id}.{$ext}")) {
            return "/assets/img/makers/{$id}.{$ext}";
        }
    }
    if ($url) {
        $domain = parse_url($url, PHP_URL_HOST);
        if ($domain) {
            return 'https://www.google.com/s2/favicons?domain=' . urlencode($domain) . '&sz=32';
        }
    }
    return '/assets/img/makers/noimage.svg';
}

// ─── データ取得 ───────────────────────────────────
try {
    $all = db() ? db()->query(
        "SELECT * FROM makers ORDER BY sort_order, id"
    )->fetchAll() : [];
} catch (Exception $e) { $all = []; }

$grouped  = [];
$rowOrder = [];
foreach ($all as $m) {
    $g = $m['row_group'];
    if (!isset($grouped[$g])) { $grouped[$g] = []; $rowOrder[] = $g; }
    $grouped[$g][] = $m;
}

$rowKeys = [
    'あ行' => 'row-a',  'か行' => 'row-ka', 'さ行' => 'row-sa',
    'た行' => 'row-ta', 'な行' => 'row-na', 'は行' => 'row-ha',
    'ま行' => 'row-ma', 'や行' => 'row-ya', 'ら行' => 'row-ra',
    'わ行' => 'row-wa', 'アルファベット' => 'row-alpha',
];
function rowId(string $group, array $map): string {
    return $map[$group] ?? 'row-' . urlencode($group);
}

include 'parts/head.php';
?>
<body class="inner-page">
<?php include 'parts/header.php'; ?>
<?php include 'parts/fullmenu.php'; ?>

<main>
  <div class="page-hero">
    <div class="page-hero-inner">
      <div class="breadcrumb">
        <a href="/">HOME</a>
        <span>›</span>
        <span>取り扱いメーカー</span>
      </div>
      <div class="page-title">取り扱いメーカー</div>
      <div class="page-title-en">MAKERS</div>
    </div>
  </div>

  <div class="content-area">
    <p class="products-lead">
      成田機材がお取り引きしているメーカーの一覧です。掲載のないメーカーもお気軽にお問い合わせください。
    </p>

    <?php if (!empty($rowOrder)): ?>
    <!-- あかさたな ジャンプインデックス -->
    <nav class="makers-index">
      <?php foreach ($rowOrder as $g): ?>
        <a class="makers-index-btn" href="#<?= rowId($g, $rowKeys) ?>">
          <?= e($g === 'アルファベット' ? 'A-Z' : mb_substr($g, 0, 1)) ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- セクション -->
    <?php foreach ($rowOrder as $g): ?>
      <section class="makers-section" id="<?= rowId($g, $rowKeys) ?>">
        <h2 class="makers-section-title"><?= e($g) ?></h2>
        <div class="makers-list">
          <?php foreach ($grouped[$g] as $m): ?>
            <?php $img = makerImgSrc((int)$m['id'], (string)($m['url'] ?? '')); ?>
            <?php if ($m['url']): ?>
            <a class="maker-row" href="<?= e($m['url']) ?>" target="_blank" rel="noopener noreferrer">
            <?php else: ?>
            <div class="maker-row maker-row--nolink">
            <?php endif; ?>
              <img class="maker-favicon" src="<?= e($img) ?>" alt="" loading="lazy" width="20" height="20">
              <span class="maker-row-name"><?= e($m['name']) ?></span>
              <?php if ($m['url']): ?>
              <svg class="maker-row-icon" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M1 11L11 1M11 1H5M11 1V7"/>
              </svg>
              <?php endif; ?>
            <?php echo $m['url'] ? '</a>' : '</div>'; ?>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endforeach; ?>

    <?php else: ?>
      <p style="color:#888;padding:40px 0">メーカー情報を準備中です。</p>
    <?php endif; ?>

  </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
