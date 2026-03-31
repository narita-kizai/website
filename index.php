<?php
$currentPage = 'home';
require_once __DIR__.'/db.php';
try { $indexNews = db() ? db()->query("SELECT * FROM news ORDER BY published_at DESC, id DESC LIMIT 5")->fetchAll() : []; } catch (Exception $e) { $indexNews = []; }
include 'parts/head.php';
?>
<body>

<!-- ローディング画面 -->
<div id="page-loader">
  <img class="loader-logo" src="narita_logo_512x512_2.png" alt="成田機材">
  <div class="loader-name">NARITA KIZAI</div>
  <div class="loader-bar-wrap"><div class="loader-bar"></div></div>
</div>

<?php include 'parts/header.php'; ?>
<?php include 'parts/fullmenu.php'; ?>


  <!-- VIDEO HERO -->
  <div class="hero-video">
    <!-- サンプル動画: Pexels フリー素材（配管・工事イメージ） -->
    <video autoplay muted loop playsinline>
      <source src="output.mp4" type="video/mp4">
      <!-- <source src="4237250-uhd_3840_2160_30fps.mp4" type="video/mp4"> -->
      <!-- <source src="v2_1773814298768-799095223.mp4" type="video/mp4"> -->
      <!-- <source src="watermarked.mp4" type="video/mp4"> -->
    </video>
    <div class="hero-video-overlay"></div>
    <div class="hero-video-content">
      <div class="hero-video-catch">PIPING &amp; HOUSING</div>
      <h1 class="hero-video-title">
        地域とともに、<br>
        半世紀。
      </h1>
      <p class="hero-video-sub">
        千葉県北部〜中部のガス・水道・住宅設備業者様を<br>
        即納対応 × 在庫力 × 現場対応力で支えています
      </p>
    </div>
    <div class="hero-bg-text">NARITA</div>
    <div class="hero-video-scroll">SCROLL</div>
    <!-- HERO NEWS BAR -->
    <div class="hero-news-bar">
      <div class="hero-news-bar-inner">
        <span class="hero-news-label">NEWS</span>
        <div class="hero-news-ticker">
          <?php $first = $indexNews[0] ?? null; ?>
          <span class="hero-news-date"><?= $first ? date('Y.m.d', strtotime($first['published_at'])) : '' ?></span>
          <a class="hero-news-text"
             href="<?= e($first ? $first['link_url'] : '#') ?>"
             <?= ($first && $first['link_external']) ? 'target="_blank" rel="noopener"' : '' ?>
          ><?= e($first ? $first['title'] : '') ?></a>
        </div>
        <a class="hero-news-more" href="/news.php">MORE</a>
      </div>
    </div>
  </div>

  <!-- MARQUEE TICKER -->
  <div class="marquee-wrap">
    <div class="marquee-track">
      <span>PIPING &amp; HOUSING</span>
      <span>地域インフラを支える</span>
      <span>創業 1978</span>
      <span>富里 ／ 茂原</span>
      <span>ガス・水道・住宅設備</span>
      <span>24名の専門スタッフ</span>
      <span>PIPING &amp; HOUSING</span>
      <span>地域インフラを支える</span>
      <span>創業 1978</span>
      <span>富里 ／ 茂原</span>
      <span>ガス・水道・住宅設備</span>
      <span>24名の専門スタッフ</span>
    </div>
  </div>

  <!-- STATEMENT SECTION -->
  <div class="statement-section">
    <div class="statement-inner">
      <div class="statement-left">
        <div class="statement-label">SINCE 1978</div>
        <h2 class="statement-title">地域のライフラインを誠実に、力強く。</h2>
      </div>
      <div class="statement-right">
        <p class="statement-body">ガス・水道・住宅設備の専門商社として千葉県北部から中部にかけて、昭和53年創業以来、地域の工事業者様とともに生活インフラを支え続けてきました。豊富な在庫と迅速な配送体制で、現場の皆様の信頼にお応えしています。</p>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="features-inner">
      <div class="features-header section-header section-deco-wrap">
        <span class="section-bg-text">FEATURES</span>
        <span class="section-title-en">OUR FEATURES</span>
        <span class="section-title-ja">私たちの強み</span>
      </div>
      <div class="feature-card">
        <span class="feature-num">01</span>
        <img src="/truck_tomisato2_new.jpg" alt="配送体制">
        <h3>充実した配送体制</h3>
        <p>トラック12台、乗用車2台、ライトバン2台、フォークリフト3台。準備万全でお届けいたします。</p>
      </div>
      <div class="feature-card">
        <span class="feature-num">02</span>
        <img src="/mop2.jpg" alt="店頭お引取り">
        <h3>早朝からの店頭お引取り</h3>
        <p>早朝より準備いたしております。現場の前にぜひお立ち寄りください。</p>
      </div>
      <div class="feature-card">
        <span class="feature-num">03</span>
        <img src="/houfu.png" alt="豊富な在庫">
        <h3>豊富な在庫と即日対応</h3>
        <p>管・継手・弁・住宅設備など多品種の商品を常時在庫。在庫品は当日対応を基本に、迅速に手配</p>
      </div>
      <div class="feature-card">
        <span class="feature-num">04</span>
        <img src="/senmon.png" alt="技術サポート">
        <h3>専門スタッフのサポート</h3>
        <p>経験豊富なスタッフが商品選定から技術的なご相談まで、現場目線で丁寧にサポートいたします。</p>
      </div>
    </div>
  </div>

  <!-- PARALLAX -->
  <div class="parallax-section">
    <div class="parallax-content">
      <div class="parallax-catch">NARITA KIZAI</div>
      <h2 class="parallax-title">
        地域のライフラインを、<br>半世紀にわたり支えてきた実績。
      </h2>
      <div class="parallax-nums">
        <div class="parallax-num">
          <div class="parallax-num-value" data-count="48" data-suffix="年"><span class="count-num">0</span><span class="parallax-num-suffix">年</span></div>
          <div class="parallax-num-label">創業からの歴史</div>
        </div>
        <div class="parallax-num">
          <div class="parallax-num-value" data-count="2" data-suffix="拠点"><span class="count-num">0</span><span class="parallax-num-suffix">拠点</span></div>
          <div class="parallax-num-label">富里・茂原</div>
        </div>
        <div class="parallax-num">
          <div class="parallax-num-value" data-count="24" data-suffix="名"><span class="count-num">0</span><span class="parallax-num-suffix">名</span></div>
          <div class="parallax-num-label">従業員数</div>
        </div>
      </div>
    </div>
  </div>

  <div class="news-section news-dark">
    <div class="section-inner">
      <div class="section-header section-deco-wrap">
        <span class="section-bg-text">NEWS</span>
        <span class="section-title-en">NEWS</span>
        <span class="section-title-ja">新着情報</span>
      </div>
      <div class="news-grid">
        <?php foreach (array_slice($indexNews, 0, 2) as $n): ?>
          <a class="news-card"
             href="<?= e($n['link_url'] ?: '#') ?>"
             <?= $n['link_external'] ? 'target="_blank" rel="noopener"' : '' ?>>
            <?php if ($n['image']): ?>
              <img class="news-card-img" src="<?= e($n['image']) ?>" alt="">
            <?php endif; ?>
            <div class="news-card-body">
              <div class="news-meta">
                <span class="news-date"><?= e(formatDate($n['published_at'])) ?></span>
                <span class="news-cat"><?= e($n['category']) ?></span>
              </div>
              <div class="news-title"><?= e($n['title']) ?></div>
              <?php if ($n['excerpt']): ?>
                <div class="news-excerpt"><?= e($n['excerpt']) ?></div>
              <?php endif; ?>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="news-more-wrap">
        <a href="/news.php" class="btn-news-more">ニュース一覧を見る</a>
      </div>
    </div>
  </div>

  <!-- FOLLOW US -->
  <div class="followus-section">
    <div class="followus-inner">
      <div class="followus-left">
        <div class="followus-label">SNS</div>
        <div class="followus-title">FOLLOW<br>US</div>
        <p class="followus-desc">
          現場の声や商品情報、業界トピックスを不定期で発信しています。日々の活動をぜひフォローしてご覧ください。
        </p>
        <a class="followus-btn" href="https://twitter.com/narita_kizai" target="_blank" rel="noopener">
          @narita_kizai をフォロー
        </a>
      </div>
      <div class="followus-timeline" id="tw-timeline-wrap">
        <a class="twitter-timeline"
           data-height="480"
           data-theme="light"
           data-chrome="noheader nofooter noborders"
           href="https://twitter.com/narita_kizai">
          Tweets by narita_kizai
        </a>
        <!-- フォールバック: widgets.js が読み込めなかった場合に表示 -->
        <div id="tw-fallback" style="display:none; height:480px; display:none; flex-direction:column; align-items:center; justify-content:center; gap:16px; background:#f7f7f7; border-radius:4px; color:#555; font-size:14px; text-align:center; padding:24px;">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="#1a1a1a"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.734-8.835L1.254 2.25H8.08l4.253 5.622 5.911-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          <span>タイムラインを読み込めませんでした</span>
          <a href="https://x.com/narita_kizai" target="_blank" rel="noopener"
             style="padding:10px 24px; background:#1a1a1a; color:#fff; border-radius:4px; text-decoration:none; font-size:13px; font-weight:700;">
            X でプロフィールを見る
          </a>
        </div>
      </div>
      <script>
      (function() {
        var wrap = document.getElementById('tw-timeline-wrap');
        var fallback = document.getElementById('tw-fallback');
        // widgets.js 読み込み後に確実に初期化
        window.twttr = window.twttr || {};
        var _ready = window.twttr.ready;
        window.twttr.ready = function(cb) {
          if (_ready) _ready.call(window.twttr, cb); else cb(window.twttr);
        };
        // 4秒後にiframeが生成されていなければフォールバック表示
        setTimeout(function() {
          if (!wrap.querySelector('iframe')) {
            wrap.querySelector('a.twitter-timeline').style.display = 'none';
            fallback.style.display = 'flex';
          }
        }, 4000);
        // widgets.js 読み込み完了後に再初期化
        if (window.twttr && window.twttr.widgets) {
          window.twttr.widgets.load(wrap);
        }
      })();
      </script>
    </div>
  </div>

  <!-- YOUTUBE -->
  <div class="youtube-section">
    <div class="youtube-inner">
      <div class="youtube-left">
        <div class="youtube-label">YouTube</div>
        <div class="youtube-title">WATCH<br>OUR<br>CHANNEL</div>
        <p class="youtube-desc">
          配管・住宅設備の現場や商品紹介など、業界の"いま"を動画でお届けしています。チャンネル登録もぜひ。
        </p>
        <a class="youtube-btn"
           href="https://www.youtube.com/channel/UCmmnGI7cfG_4hMycCaGSMmw"
           target="_blank" rel="noopener">
          チャンネルを見る
        </a>
      </div>
      <a class="youtube-embed"
         href="https://www.youtube.com/watch?v=-dz9ND5nlng"
         target="_blank" rel="noopener">
        <img src="https://img.youtube.com/vi/-dz9ND5nlng/hqdefault.jpg"
             alt="モルコ締付工具 ＢＰＮ-１６Ｒのご紹介♪">
        <div class="youtube-play">
          <div class="youtube-play-icon"></div>
        </div>
        <div class="youtube-video-title">モルコ締付工具 ＢＰＮ-１６Ｒのご紹介♪</div>
      </a>
    </div>
  </div>

  <!-- PARALLAX 2 -->
  <div class="parallax-section" style="background-image: url('https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=1600&q=80');">
    <div class="parallax-content">
      <div class="parallax-catch">CONTACT US</div>
      <h2 class="parallax-title">
        お気軽にご相談ください。
      </h2>
      <p class="cta-lead">
        配管機材・住宅資材のことなら、<br>お電話・メールにてお問い合わせください。
      </p>
      <div class="parallax-nums parallax-nums-contact">
        <a href="tel:0476930635" class="cta-tel-link">
          <span class="cta-tel-label">本店・富里営業部</span>
          <span class="cta-tel-num">0476-93-0635</span>
        </a>
        <a href="tel:0475250812" class="cta-tel-link">
          <span class="cta-tel-label">茂原営業所</span>
          <span class="cta-tel-num">0475-25-0812</span>
        </a>
      </div>
    </div>
  </div>

<?php include 'parts/footer.php'; ?>
<?php include 'parts/scripts.php'; ?>
<script>
(function() {
  var items = <?= json_encode(array_map(function($n) {
    return [
      'date'     => date('Y.m.d', strtotime($n['published_at'])),
      'text'     => $n['title'],
      'url'      => $n['link_url'],
      'external' => (bool)$n['link_external'],
    ];
  }, $indexNews), JSON_UNESCAPED_UNICODE) ?>;
  var idx = 0;
  var ticker = document.querySelector('.hero-news-ticker');
  var dateEl = document.querySelector('.hero-news-date');
  var textEl = document.querySelector('.hero-news-text');
  if (!ticker) return;
  setInterval(function() {
    ticker.style.opacity = '0';
    setTimeout(function() {
      idx = (idx + 1) % items.length;
      var item = items[idx];
      dateEl.textContent = item.date;
      textEl.textContent = item.text;
      textEl.href = item.url;
      if (item.external) {
        textEl.setAttribute('target', '_blank');
        textEl.setAttribute('rel', 'noopener');
      } else {
        textEl.removeAttribute('target');
        textEl.removeAttribute('rel');
      }
      ticker.style.opacity = '1';
    }, 400);
  }, 5000);
})();
</script>
</body>
</html>
