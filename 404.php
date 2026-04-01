<?php
http_response_code(404);
$pageTitle = 'ページが見つかりません';
$currentPage = '';
include 'parts/head.php';
?>
<style>
.e404-wrap {
  background: var(--navy);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 140px 24px 80px;
  position: relative;
  overflow: hidden;
}
.e404-bg-num {
  position: absolute;
  font-family: var(--display);
  font-size: clamp(200px, 40vw, 420px);
  color: rgba(255,255,255,0.03);
  line-height: 1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  pointer-events: none;
  user-select: none;
  white-space: nowrap;
}
.e404-inner {
  max-width: 1100px;
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
  position: relative;
  z-index: 1;
}
.e404-message {
  color: var(--white);
}
.e404-label {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.4em;
  color: var(--accent);
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 24px;
}
.e404-label::before {
  content: '';
  display: block;
  width: 32px;
  height: 1px;
  background: var(--accent);
}
.e404-num {
  font-family: var(--display);
  font-size: clamp(72px, 12vw, 120px);
  color: var(--accent);
  line-height: 1;
  margin-bottom: 16px;
}
.e404-title {
  font-family: var(--serif);
  font-size: clamp(22px, 3.5vw, 36px);
  font-weight: 700;
  line-height: 1.5;
  margin-bottom: 20px;
  color: var(--white);
}
.e404-body {
  font-size: 14px;
  line-height: 2;
  color: rgba(255,255,255,0.65);
  margin-bottom: 40px;
}
.e404-body strong {
  color: var(--accent-light);
}
.e404-btns {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}
.e404-btn-primary {
  display: inline-block;
  padding: 14px 36px;
  background: var(--accent);
  color: var(--navy);
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.2em;
  text-decoration: none;
  border-radius: 2px;
  font-weight: 700;
  transition: background 0.2s, transform 0.2s;
}
.e404-btn-primary:hover {
  background: var(--accent-light);
  transform: translateY(-2px);
}
.e404-btn-secondary {
  display: inline-block;
  padding: 14px 36px;
  border: 1px solid rgba(255,255,255,0.3);
  color: rgba(255,255,255,0.7);
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.2em;
  text-decoration: none;
  border-radius: 2px;
  transition: border-color 0.2s, color 0.2s, transform 0.2s;
}
.e404-btn-secondary:hover {
  border-color: rgba(255,255,255,0.7);
  color: var(--white);
  transform: translateY(-2px);
}

/* フォトアルバム */
.e404-album {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: repeat(4, 1fr);
  gap: 4px;
  width: 100%;
  aspect-ratio: 1;
  position: relative;
}
.e404-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  box-shadow: 6px 6px 18px rgba(0,0,0,0.5);
  border: 4px solid rgba(255,255,255,0.92);
  transition: transform 0.35s cubic-bezier(0.4,0,0.2,1), z-index 0s, box-shadow 0.35s;
  position: relative;
  cursor: pointer;
}
.e404-photo:nth-child(1)  { transform: rotate(-4deg)  translate(4px, 2px); }
.e404-photo:nth-child(2)  { transform: rotate(3deg)   translate(-2px, 5px); }
.e404-photo:nth-child(3)  { transform: rotate(-2deg)  translate(3px, -3px); }
.e404-photo:nth-child(4)  { transform: rotate(5deg)   translate(-4px, 2px); }
.e404-photo:nth-child(5)  { transform: rotate(2deg)   translate(2px, -2px); }
.e404-photo:nth-child(6)  { transform: rotate(-5deg)  translate(-3px, 4px); }
.e404-photo:nth-child(7)  { transform: rotate(4deg)   translate(5px, -1px); }
.e404-photo:nth-child(8)  { transform: rotate(-3deg)  translate(-2px, 3px); }
.e404-photo:nth-child(9)  { transform: rotate(6deg)   translate(3px, 2px); }
.e404-photo:nth-child(10) { transform: rotate(-2deg)  translate(-4px, -3px); }
.e404-photo:nth-child(11) { transform: rotate(3deg)   translate(2px, 4px); }
.e404-photo:nth-child(12) { transform: rotate(-6deg)  translate(-3px, 2px); }
.e404-photo:nth-child(13) { transform: rotate(2deg)   translate(4px, -2px); }
.e404-photo:nth-child(14) { transform: rotate(-4deg)  translate(-2px, 3px); }
.e404-photo:nth-child(15) { transform: rotate(5deg)   translate(3px, -4px); }
.e404-photo:nth-child(16) { transform: rotate(-3deg)  translate(-3px, 2px); }
.e404-photo:hover {
  transform: rotate(0deg) scale(1.12) !important;
  z-index: 10;
  box-shadow: 12px 12px 32px rgba(0,0,0,0.6);
}

/* ライトボックスナビゲーション */
.lb-nav-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.35);
  color: #fff;
  width: 52px;
  height: 52px;
  font-size: 22px;
  cursor: pointer;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s;
  z-index: 10001;
  flex-shrink: 0;
}
.lb-nav-btn:hover { background: rgba(255,255,255,0.28); }
#lb-prev { left: 24px; }
#lb-next { right: 24px; }
@media (max-width: 768px) {
  .e404-inner {
    grid-template-columns: 1fr;
    gap: 48px;
  }
  .e404-album {
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: auto;
    aspect-ratio: auto;
    max-width: 360px;
    margin: 0 auto;
  }
  .e404-photo {
    aspect-ratio: 1;
  }
  .lb-nav-btn { display: none; }
  #lb-img { max-width: 92vw !important; max-height: 82vh !important; }
  .e404-btn-primary,
  .e404-btn-secondary { padding: 12px 22px; font-size: 12px; }
}
</style>
<body class="inner-page">
<?php include 'parts/header.php'; ?>
<?php include 'parts/fullmenu.php'; ?>

<div class="e404-wrap">
  <div class="e404-bg-num">404</div>

  <div class="e404-inner">
    <!-- メッセージ -->
    <div class="e404-message">
      <div class="e404-label">PAGE NOT FOUND</div>
      <div class="e404-num">404</div>
      <h1 class="e404-title">
        道に迷いましたか？<br>
        迷ったなら、<br>
        成田機材があります。
      </h1>
      <p class="e404-body">
        お探しのページは見つかりませんでした。<br>
        でも、迷い込んだこのページで<br>
        少し私たちのことを知ってもらえたら嬉しいです。
      </p>
      <div class="e404-btns">
        <a href="/" class="e404-btn-primary">トップへ戻る</a>
        <a href="/recruit" class="e404-btn-secondary">採用情報へ</a>
      </div>
    </div>

    <!-- フォトアルバム -->
    <div class="e404-album">
      <?php for ($i = 1; $i <= 16; $i++): ?>
      <img class="e404-photo" src="/image404/image404_ (<?= $i ?>).jpg" alt="成田機材の仲間たち">
      <?php endfor; ?>
    </div>
  </div>
</div>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>

<!-- ライトボックス -->
<div id="lb-overlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center; cursor:zoom-out;">
  <button id="lb-prev" class="lb-nav-btn">&#8592;</button>
  <img id="lb-img" src="" alt="" style="max-width:60vw; max-height:60vh; object-fit:contain; box-shadow:0 8px 48px rgba(0,0,0,0.8); border:4px solid rgba(255,255,255,0.9); border-radius:2px; transition:opacity 0.2s; opacity:0;">
  <button id="lb-next" class="lb-nav-btn">&#8594;</button>
</div>
<script>
(function(){
  var overlay  = document.getElementById('lb-overlay');
  var lbImg    = document.getElementById('lb-img');
  var btnPrev  = document.getElementById('lb-prev');
  var btnNext  = document.getElementById('lb-next');
  var photos   = Array.from(document.querySelectorAll('.e404-photo'));
  var current  = 0;

  function showPhoto(idx) {
    current = (idx + photos.length) % photos.length;
    lbImg.style.opacity = '0';
    setTimeout(function(){
      lbImg.src = photos[current].src;
      lbImg.style.opacity = '1';
    }, 150);
  }

  function openLightbox(idx) {
    current = idx;
    lbImg.src = photos[current].src;
    lbImg.style.opacity = '0';
    overlay.style.display = 'flex';
    setTimeout(function(){ lbImg.style.opacity = '1'; }, 10);
  }

  function closeLightbox() {
    lbImg.style.opacity = '0';
    setTimeout(function(){ overlay.style.display = 'none'; }, 200);
  }

  photos.forEach(function(img, i){
    img.addEventListener('click', function(){ openLightbox(i); });
  });

  // PC: 左右ボタン
  btnPrev.addEventListener('click', function(e){
    e.stopPropagation();
    showPhoto(current - 1);
  });
  btnNext.addEventListener('click', function(e){
    e.stopPropagation();
    showPhoto(current + 1);
  });

  // オーバーレイクリックで閉じる
  var touchMoved = false;
  overlay.addEventListener('click', function(e){
    if (touchMoved) { touchMoved = false; return; }
    if (e.target === overlay || e.target === lbImg) closeLightbox();
  });

  // キーボード操作
  document.addEventListener('keydown', function(e){
    if (overlay.style.display === 'none') return;
    if (e.key === 'Escape')      closeLightbox();
    if (e.key === 'ArrowLeft')   showPhoto(current - 1);
    if (e.key === 'ArrowRight')  showPhoto(current + 1);
  });

  // スマホ: スワイプ
  var touchStartX = 0;
  overlay.addEventListener('touchstart', function(e){
    touchStartX = e.touches[0].clientX;
    touchMoved = false;
  }, { passive: true });
  overlay.addEventListener('touchend', function(e){
    var dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 50) {
      touchMoved = true;
      if (dx < 0) showPhoto(current + 1);
      else         showPhoto(current - 1);
    }
  }, { passive: true });
})();
</script>
</body>
</html>
