<?php
session_start();
$_SESSION['form_time'] = time();
$pageTitle = 'お問い合わせ';
$currentPage = 'contact';
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
        <span>お問い合わせ</span>
      </div>
      <div class="page-title">お問い合わせ</div>
      <div class="page-title-en">CONTACT</div>
    </div>
  </div>

  <div class="content-area">
    <?php if (isset($_GET['sent'])): ?>
    <div class="contact-thanks">
      <p>お問い合わせありがとうございました。<br>内容を確認の上、担当者よりご連絡いたします。</p>
      <a href="/" class="btn-primary">トップページへ戻る</a>
    </div>
    <?php elseif (isset($_GET['error'])): ?>
    <div class="contact-error">
      <p>送信に失敗しました。お手数ですが、お電話にてお問い合わせください。</p>
    </div>
    <?php endif; ?>

    <div class="contact-intro">
      <p>配管機材・住宅資材に関するご質問・ご相談はお気軽にどうぞ。<br>
      お急ぎの場合はお電話でもお受けしています。</p>
      <div class="contact-tel-block">
        <div class="contact-tel-item">
          <span class="contact-tel-label">本店・富里営業部</span>
          <a href="tel:0476930635" class="contact-tel-num">0476-93-0635</a>
        </div>
        <div class="contact-tel-item">
          <span class="contact-tel-label">茂原営業所</span>
          <a href="tel:0475250812" class="contact-tel-num">0475-25-0812</a>
        </div>
      </div>
    </div>

    <form class="contact-form" action="/contact-send.php" method="post">
      <!-- ハニーポット: ボット対策（人間には見えない） -->
      <div style="position:absolute;left:-9999px;top:-9999px;opacity:0;pointer-events:none;" aria-hidden="true">
        <input type="text" name="website" tabindex="-1" autocomplete="off">
      </div>
      <div class="form-group">
        <label class="form-label" for="name">お名前 <span class="form-required">必須</span></label>
        <input class="form-input" type="text" id="name" name="name" required placeholder="例）山田 太郎">
      </div>
      <div class="form-group">
        <label class="form-label" for="company">会社名・屋号</label>
        <input class="form-input" type="text" id="company" name="company" placeholder="例）○○設備株式会社">
      </div>
      <div class="form-group">
        <label class="form-label" for="email">メールアドレス <span class="form-required">必須</span></label>
        <input class="form-input" type="email" id="email" name="email" required placeholder="例）info@example.com">
      </div>
      <div class="form-group">
        <label class="form-label" for="tel">電話番号</label>
        <input class="form-input" type="tel" id="tel" name="tel" placeholder="例）0476-93-0000">
      </div>
      <div class="form-group">
        <label class="form-label" for="category">お問い合わせ種別 <span class="form-required">必須</span></label>
        <select class="form-select" id="category" name="category" required>
          <option value="">選択してください</option>
          <option value="商品について">商品について</option>
          <option value="お見積りについて">お見積りについて</option>
          <option value="在庫確認">在庫確認</option>
          <option value="採用について">採用について</option>
          <option value="資料請求">資料請求</option>
          <option value="その他">その他</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label" for="message">お問い合わせ内容 <span class="form-required">必須</span></label>
        <textarea class="form-textarea" id="message" name="message" required rows="6" placeholder="お問い合わせ内容をご記入ください"></textarea>
      </div>
      <input type="hidden" name="recaptcha_token" id="recaptcha_token">
      <div class="form-submit">
        <button class="btn-primary" type="submit">送信する</button>
      </div>
    </form>
  </div>
</main>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
<script src="https://www.google.com/recaptcha/api.js?render=6LeXWOQsAAAAADb0VEBzK4z3ICkPCsNTGtrRZ_YX"></script>
<script>
  document.querySelector('.contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = this;
    grecaptcha.ready(function() {
      grecaptcha.execute('6LeXWOQsAAAAADb0VEBzK4z3ICkPCsNTGtrRZ_YX', {action: 'contact'}).then(function(token) {
        document.getElementById('recaptcha_token').value = token;
        form.submit();
      });
    });
  });
</script>
</body>
</html>
