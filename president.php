<?php
$pageTitle = '代表ご挨拶';
$currentPage = 'president';
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
        <span>代表ご挨拶</span>
      </div>
      <div class="page-title">代表ご挨拶</div>
      <div class="page-title-en">MESSAGE FROM PRESIDENT</div>
    </div>
  </div>
  <div class="content-area">
    <div class="president-with-x">
      <!-- 左: 既存コンテンツ -->
      <div>
        <div class="president-block">
          <div class="president-flip">
            <div class="president-flip-inner">
              <div class="president-flip-front">
                <img class="president-img" src="/boss.jpg" alt="代表取締役社長 中嶋哲寛">
              </div>
              <div class="president-flip-back">
                <img class="president-img" src="/boss2.png" alt="代表取締役社長 中嶋哲寛">
              </div>
            </div>
          </div>
          <div>
            <p class="president-text">
              このたびは成田機材株式会社ホームページをご覧いただき、誠にありがとうございます。<br><br>
              成田機材株式会社は千葉県北部から中部にかけて営業活動を展開し、地域のガス・水道設備業のお客様にご愛顧いただき、今日に至っております。<br><br>
              当社では、代々大切にしてきた「お客様満足度の向上」「社員の生活の向上」「社会への貢献」という企業理念を守り続けております。<br><br>
              初めてのお客様におかれましても、ぜひ当社をご利用いただき、その利便性を実感していただければ幸いです。
            </p>
            <div class="president-name">
              <span>代表取締役社長</span>
              中嶋　哲寛
            </div>
          </div>
        </div>
      </div>
      <!-- 右: X タイムライン -->
      <div>
        <div class="president-x-label">DAILY POST</div>
        <a class="twitter-timeline"
           data-height="520"
           data-theme="light"
           data-chrome="noheader nofooter noborders"
           href="https://twitter.com/narita_kizai">
          Tweets by narita_kizai
        </a>
      </div>
    </div>
  </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
