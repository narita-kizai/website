<?php
$_cp = isset($currentPage) ? $currentPage : 'home';
$_company_pages = ['company','president','history','executive','associate','access'];
function _nav_active($pages, $current) {
  $pages = is_array($pages) ? $pages : [$pages];
  return in_array($current, $pages) ? ' active' : '';
}
?>
<!-- TOPBAR -->
<div class="topbar">
  <div class="topbar-inner">
    <a href="mailto:narita@narita-kizai.com">✉ narita@narita-kizai.com</a>
    <a href="tel:0476930635">📞 0476-93-0635</a>
  </div>
</div>

<!-- HEADER -->
<header>
  <div class="header-inner">
    <a class="logo" href="/">
      <img class="logo-img" src="/narita_logo_512x512_2.png" alt="成田機材株式会社">
      <div class="logo-text">
        <span class="logo-main">成田機材株式会社</span>
        <span class="logo-sub">Piping &amp; Housing</span>
      </div>
    </a>
    <nav>
      <div class="nav-item">
        <a class="nav-link<?= _nav_active('home', $_cp) ?>" href="/">ホーム</a>
      </div>
      <div class="nav-item">
        <span class="nav-link has-dropdown<?= _nav_active($_company_pages, $_cp) ?>">会社情報</span>
        <div class="dropdown">
          <a href="/company.php">会社概要</a>
          <a href="/president.php">代表ご挨拶</a>
          <a href="/history.php">会社沿革</a>
          <a href="/executive.php">役員のご紹介</a>
          <a href="/associate.php">関連会社</a>
          <a href="/access.php">アクセス</a>
        </div>
      </div>
      <div class="nav-item">
        <a class="nav-link<?= _nav_active('products', $_cp) ?>" href="/products.php">取扱い商品</a>
      </div>
      <div class="nav-item">
        <a class="nav-link<?= _nav_active('news', $_cp) ?>" href="/news.php">ニュース</a>
      </div>
      <div class="nav-item">
        <a class="nav-link<?= _nav_active('recruit', $_cp) ?>" href="/recruit.php">採用情報</a>
      </div>
      <div class="nav-item">
        <a class="nav-link<?= _nav_active('contact', $_cp) ?>" href="/contact.php">お問い合わせ</a>
      </div>
    </nav>
    <div class="hamburger" id="hamburger" onclick="toggleFullMenu()">
      <span></span><span></span><span></span>
    </div>
  </div>
</header>
