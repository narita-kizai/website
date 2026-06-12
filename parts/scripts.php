<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
// ─── PAGE LOADER ───
(function() {
  var loader = document.getElementById('page-loader');
  if (!loader) return;
  var START = window._pageStart || Date.now();
  var MIN_SHOW = 2200; // バーアニメーション(1.8s)が完了するまで待つ
  var done = false;
  function hideLoader() {
    if (done) return;
    done = true;
    var wait = Math.max(0, MIN_SHOW - (Date.now() - START));
    setTimeout(function() {
      var bar = loader.querySelector('.loader-bar');
      if (bar) {
        bar.style.animation = 'none';
        bar.style.transition = 'width 0.3s ease';
        bar.style.width = '100%';
      }
      setTimeout(function() {
        loader.classList.add('fade-out');
        // display:none ではなく visibility:hidden にすることで
        // 動画レイヤーの再描画を防ぎ、動画フリーズを回避する
        setTimeout(function() {
          loader.style.visibility = 'hidden';
          loader.style.pointerEvents = 'none';
        }, 850);
      }, 350);
    }, wait);
  }
  // DOMContentLoaded + 500ms: 動画のロード完了を待たない（20秒以上かかる場合あり）
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(hideLoader, 500);
  });
  // window.load が先に来た場合（高速回線）にも対応
  window.addEventListener('load', hideLoader);
  // 最大フォールバック
  setTimeout(hideLoader, 8000);
})();

// ─── SCROLL HEADER ───
function checkScroll() {
  if (!document.body.classList.contains('inner-page')) {
    const header = document.querySelector('header');
    header.classList.toggle('scrolled', window.scrollY > 60);
  }
}
window.addEventListener('scroll', checkScroll);
checkScroll();

// ─── FULL SCREEN MENU ───
function openFullMenu() {
  document.getElementById('fullMenu').classList.add('open');
  document.getElementById('hamburger').classList.add('menu-open');
  document.body.style.overflow = 'hidden';
}
function closeFullMenu() {
  document.getElementById('fullMenu').classList.remove('open');
  document.getElementById('hamburger').classList.remove('menu-open');
  document.body.style.overflow = '';
}
function toggleFullMenu() {
  if (document.getElementById('fullMenu').classList.contains('open')) {
    closeFullMenu();
  } else {
    openFullMenu();
  }
}
// ESCキーで閉じる
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeFullMenu();
});

// ─── COUNT-UP ANIMATION ───
(function() {
  const countObserver = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      e.target.querySelectorAll('.parallax-num-value[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count);
        const numEl = el.querySelector('.count-num');
        if (!numEl) return;
        let current = 0;
        const duration = 1800;
        const interval = 24;
        const steps = duration / interval;
        const inc = target / steps;
        const timer = setInterval(() => {
          current += inc;
          if (current >= target) { current = target; clearInterval(timer); }
          numEl.textContent = Math.floor(current);
        }, interval);
      });
      countObserver.unobserve(e.target);
    });
  }, { threshold: 0.5 });
  document.querySelectorAll('.parallax-nums').forEach(el => countObserver.observe(el));
})();

// ─── SCROLL ANIMATIONS ───
const _animObserver = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); _animObserver.unobserve(e.target); } });
}, { threshold: 0.12 });

function _applyAnim(scope) {
  scope = scope || document;
  scope.querySelectorAll('.feature-card, .news-item, .parallax-catch, .parallax-title, .parallax-num, .section-header').forEach((el, i) => {
    if (!el.classList.contains('anim')) {
      el.classList.add('anim');
      if (i % 3 === 1) el.classList.add('anim-d1');
      if (i % 3 === 2) el.classList.add('anim-d2');
    }
    _animObserver.observe(el);
  });
}
_applyAnim(document);

// ─── SHOW PAGE WRAPPER (page transitions + re-observe inner page) ───
(function() {
  const _orig = window.showPage;
  window.showPage = function(id) {
    const result = _orig(id);
    // re-observe elements in newly active inner page
    if (id !== 'home') {
      setTimeout(() => {
        const activePage = document.getElementById(id);
        if (activePage) {
          activePage.querySelectorAll('.content-area > *, .page-hero').forEach((el, i) => {
            if (!el.classList.contains('anim')) {
              el.classList.add('anim');
              if (i === 1) el.classList.add('anim-d1');
              if (i === 2) el.classList.add('anim-d2');
            }
            _animObserver.observe(el);
          });
        }
      }, 50);
    }
    return result;
  };
})();

</script>


<script>
// Twitter/X widgets.js: 読み込み完了後にタイムラインを再初期化
window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s); js.id = id; js.async = true;
  js.src = 'https://platform.twitter.com/widgets.js';
  js.charset = 'utf-8';
  fjs.parentNode.insertBefore(js, fjs);
  t._e = [];
  t.ready = function(f) { t._e.push(f); };
  return t;
}(document, 'script', 'twitter-wjs'));
window.twttr.ready(function(twttr) {
  var wrap = document.getElementById('tw-timeline-wrap');
  if (wrap) twttr.widgets.load(wrap);
});
</script>
