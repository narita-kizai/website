<?php
$pageTitle = '会社概要';
$currentPage = 'company';
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
        <span>会社概要</span>
      </div>
      <div class="page-title">会社概要</div>
      <div class="page-title-en">COMPANY PROFILE</div>
    </div>
  </div>
  <div class="content-area">
    <div class="content-block">
      <div class="content-block-title">基本情報</div>
      <table class="data-table">
        <tr><th>商号</th><td>成田機材株式会社</td></tr>
        <tr><th>代表取締役社長</th><td>中嶋　哲寛</td></tr>
        <tr><th>本店・富里営業部</th><td>〒286-0221 千葉県富里市七栄１９９番地<br>TEL 0476-93-0635　／　FAX 0476-93-7460</td></tr>
        <tr><th>茂原営業所</th><td>〒297-0017 千葉県茂原市東郷１０１１－１<br>TEL 0475-25-0812　／　FAX 0475-24-1315</td></tr>
        <tr><th>設立</th><td>昭和５３年６月６日</td></tr>
        <tr><th>資本金</th><td>１０，０００千円</td></tr>
        <tr><th>従業員</th><td>２４名（富里店１４名・茂原店１０名）</td></tr>
        <tr><th>決算期</th><td>３月３１日</td></tr>
      </table>
    </div>
    <div class="content-block">
      <div class="content-block-title">企業理念</div>
      <div class="philosophy-list">
        <div class="philosophy-item">
          <span class="philosophy-num">1</span>
          <p class="philosophy-text">ガス・水道・管工事・住宅機器の卸売業として地域社会の発展に貢献する会社を目指します。</p>
        </div>
        <div class="philosophy-item">
          <span class="philosophy-num">2</span>
          <p class="philosophy-text">会社経営の原動力となる社員とその家族の生活の向上を目指します。</p>
        </div>
        <div class="philosophy-item">
          <span class="philosophy-num">3</span>
          <p class="philosophy-text">企業コンプライアンスを重視し、社会に貢献する健全な会社を目指します。</p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
