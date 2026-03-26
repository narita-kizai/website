<?php
$pageTitle = 'アクセス';
$currentPage = 'access';
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
        <span>アクセス</span>
      </div>
      <div class="page-title">アクセス</div>
      <div class="page-title-en">ACCESS</div>
    </div>
  </div>
  <div class="content-area">
    <div class="access-block">
      <img class="access-photo" src="/honten.jpg" alt="本店・富里営業部 外観">
      <div class="access-card">
        <h3>本店・富里営業部</h3>
        <address>
          <strong>〒286-0221</strong><br>
          千葉県富里市七栄１９９番地<br>
          <strong>TEL</strong> 0476-93-0635<br>
          <strong>FAX</strong> 0476-93-7460
        </address>
      </div>
      <div class="map-container">
        <iframe
          src="https://maps.google.com/maps?q=成田機材株式会社&output=embed&hl=ja&z=10"
          allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
    <div class="access-block">
      <img class="access-photo" src="/mobara.png" alt="茂原営業所 外観">
      <div class="access-card">
        <h3>茂原営業所</h3>
        <address>
          <strong>〒297-0017</strong><br>
          千葉県茂原市東郷１０１１－１<br>
          <strong>TEL</strong> 0475-25-0812<br>
          <strong>FAX</strong> 0475-24-1315
        </address>
      </div>
      <div class="map-container">
        <iframe
          src="https://maps.google.com/maps?q=成田機材株式会社茂原営業所&output=embed&hl=ja&z=10"
          allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
