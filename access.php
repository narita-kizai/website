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
    <div class="access-grid">
      <div class="access-card">
        <h3>本店・富里営業部</h3>
        <address>
          <strong>〒286-0221</strong><br>
          千葉県富里市七栄１９９番地<br>
          <strong>TEL</strong> 0476-93-0635<br>
          <strong>FAX</strong> 0476-93-7460<br>
        </address>
      </div>
      <div class="access-card">
        <h3>茂原営業所</h3>
        <address>
          <strong>〒297-0017</strong><br>
          千葉県茂原市東郷１０１１－１<br>
          <strong>TEL</strong> 0475-25-0812<br>
          <strong>FAX</strong> 0475-24-1315
        </address>
      </div>
    </div>
    <div class="map-container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.2!2d140.3167!3d35.7167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60228a1234567890%3A0x1234567890abcdef!2z5Y+M55Sw5qmL5p2x5qCh5byP5Lya5pyJ5qCh5ZyS!5e0!3m2!1sja!2sjp!4v1234567890"
        allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
