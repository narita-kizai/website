<?php
$pageTitle   = 'ニュース';
$currentPage = 'news';
require_once __DIR__.'/db.php';
try {
    $allNews = db() ? db()->query("SELECT * FROM news ORDER BY published_at DESC, id DESC")->fetchAll() : [];
    $cats    = db() ? db()->query("SELECT DISTINCT category FROM news ORDER BY category")->fetchAll(PDO::FETCH_COLUMN) : [];
} catch (Exception $e) { $allNews = []; $cats = []; }
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
        <span>ニュース</span>
      </div>
      <div class="page-title">ニュース</div>
      <div class="page-title-en">NEWS</div>
    </div>
  </div>

  <div class="content-area">
    <div class="news-filter">
      <button class="news-filter-btn active" data-filter="all">すべて</button>
      <?php foreach ($cats as $cat): ?>
        <button class="news-filter-btn" data-filter="<?= e($cat) ?>"><?= e($cat) ?></button>
      <?php endforeach; ?>
    </div>
    <div class="news-grid" id="newsGrid">
      <?php foreach ($allNews as $n): ?>
        <a class="news-card" data-cat="<?= e($n['category']) ?>"
           href="<?= e($n['link_url'] ?: '#') ?>"
           <?= $n['link_external'] ? 'target="_blank" rel="noopener"' : '' ?>>
          <?php if ($n['image']): ?>
            <img class="news-card-img" src="<?= e($n['image']) ?>" alt="">
          <?php endif; ?>
          <div class="news-card-body">
            <div class="news-meta">
              <span class="news-date"><?= e(formatDate($n['published_at'])) ?></span>
              <span class="news-cat"><?= e($n['category']) ?></span>
            </div>
            <div class="news-title"><?= e($n['title']) ?></div>
            <?php if ($n['excerpt']): ?>
              <div class="news-excerpt"><?= e($n['excerpt']) ?></div>
            <?php endif; ?>
          </div>
        </a>
      <?php endforeach; ?>
      <?php if (empty($allNews)): ?>
        <p style="color:#888;padding:40px 0">現在、お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </div>
</main>

<script>
document.querySelectorAll('.news-filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.news-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.dataset.filter;
    document.querySelectorAll('#newsGrid .news-card').forEach(card => {
      card.style.display = (filter === 'all' || card.dataset.cat === filter) ? '' : 'none';
    });
  });
});
</script>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
