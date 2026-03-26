<?php
http_response_code(404);
$pageTitle = 'ページが見つかりません';
$currentPage = '';
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
        <span>404</span>
      </div>
      <div class="page-title">404</div>
      <div class="page-title-en">PAGE NOT FOUND</div>
    </div>
  </div>
  <div class="content-area" style="text-align:center; padding: 80px 24px;">
    <p style="font-size:15px; color:var(--gray-700); line-height:2; margin-bottom:40px;">
      お探しのページは見つかりませんでした。<br>
      URLが変更・削除されたか、入力ミスの可能性があります。
    </p>
    <a href="/" style="display:inline-block; padding:14px 48px; background:var(--navy); color:#fff; font-family:var(--display); font-size:13px; letter-spacing:0.2em; text-decoration:none; border-radius:2px; transition:background 0.2s;" onmouseover="this.style.background='var(--navy-light)'" onmouseout="this.style.background='var(--navy)'">
      トップページへ戻る
    </a>
  </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
</body>
</html>
