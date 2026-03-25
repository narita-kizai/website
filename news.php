<?php
$pageTitle = 'ニュース';
$currentPage = 'news';
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
      <button class="news-filter-btn" data-filter="採用情報">採用情報</button>
      <button class="news-filter-btn" data-filter="ご案内">ご案内</button>
    </div>
    <div class="news-grid" id="newsGrid">
      <a class="news-card" data-cat="採用情報" href="https://www.baitoru.com/cjlist500896/" target="_blank" rel="noopener">
        <img class="news-card-img" src="/bitle.jpg" alt="バイトル" style="object-fit:contain;background:#f5f5f5;">
        <div class="news-card-body">
          <div class="news-meta">
            <span class="news-date">2026年3月25日</span>
            <span class="news-cat">採用情報</span>
          </div>
          <div class="news-title">バイトルにてアルバイトを募集しています</div>
          <div class="news-excerpt">本店・富里営業部でアルバイトスタッフを募集中です。バイトルからご応募ください。</div>
        </div>
      </a>
      <a class="news-card" data-cat="ご案内" href="/recruit.php">
        <img class="news-card-img" src="/office3.jpg" alt="">
        <div class="news-card-body">
          <div class="news-meta">
            <span class="news-date">2026年2月19日</span>
            <span class="news-cat">ご案内</span>
          </div>
          <div class="news-title">現在、正社員を募集中です</div>
          <div class="news-excerpt">ただいま本店・富里営業部で正社員（営業職・配送職）を募集しております。</div>
        </div>
      </a>
      <a class="news-card" data-cat="ご案内" href="https://www.benkan.co.jp/voice/10451.html" target="_blank" rel="noopener">
        <img class="news-card-img" src="/boss_benkan.jpg" alt="">
        <div class="news-card-body">
          <div class="news-meta">
            <span class="news-date">2018年5月10日</span>
            <span class="news-cat">ご案内</span>
          </div>
          <div class="news-title">ステンレス配管のベンカン様に紹介していただきました</div>
          <div class="news-excerpt">ベンカン様のホームページの「皆様の声」で当社を紹介していただきました。</div>
        </div>
      </a>
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
