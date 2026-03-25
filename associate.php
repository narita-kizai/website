<?php
$pageTitle = '関連会社';
$currentPage = 'associate';
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
        <span>関連会社</span>
      </div>
      <div class="page-title">関連会社</div>
      <div class="page-title-en">GROUP COMPANIES</div>
    </div>
  </div>
  <div class="content-area">
    <div class="content-block">
      <div class="content-block-title">親会社</div>
      <div class="associate-grid">
        <div class="associate-card">
          <h4><a href="http://www.kk-kojima.co.jp" target="_blank">株式会社古島</a></h4>
          <table>
            <tr><td>資本金</td><td>２億５千万円</td></tr>
            <tr><td>設立</td><td>大正６年３月２３日</td></tr>
            <tr><td>代表</td><td>北垣　信義</td></tr>
            <tr><td>本社</td><td>東京都中央区日本橋茅場町２－１７－７</td></tr>
            <tr><td>支店</td><td>東京・大阪・北海道・九州・中国・東海・東北</td></tr>
          </table>
        </div>
      </div>
    </div>
    <div class="content-block">
      <div class="content-block-title">関連会社一覧</div>
      <table class="related-table">
        <tr>
          <td><a href="https://www.settsu-kizai.co.jp/" target="_blank">摂津機材株式会社</a></td>
          <td>大阪府吹田市</td>
        </tr>
        <tr>
          <td><a href="http://www.nwatertec.co.jp/" target="_blank">株式会社ウォーターテック</a></td>
          <td>東京都港区</td>
        </tr>
        <tr>
          <td>恵庭管材株式会社</td>
          <td>北海道恵庭市</td>
        </tr>
        <tr>
          <td>帯広管材株式会社</td>
          <td>北海道河東郡音更町</td>
        </tr>
        <tr>
          <td>関西倉庫株式会社</td>
          <td>大阪府大阪市</td>
        </tr>
      </table>
    </div>
  </div>
</div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
