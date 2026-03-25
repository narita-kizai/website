<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
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

// ─── CUSTOM CURSOR ───
(function initCursor() {
  var ring     = document.getElementById('cursorRing');
  var dot      = document.getElementById('cursorDot');
  var ringText = document.getElementById('cursorRingText');
  if (!ring || !dot) {
    // 要素がまだなければ DOMContentLoaded 後に再試行
    document.addEventListener('DOMContentLoaded', initCursor);
    return;
  }

  var mx = -300, my = -300, rx = -300, ry = -300;
  var rSize = 16; // ネズミ画像の半径 (32px / 2)

  document.addEventListener('mousemove', function(e) { mx = e.clientX; my = e.clientY; });

  (function lerp() {
    rx += (mx - rx) * 0.07;
    ry += (my - ry) * 0.07;
    ring.style.left = (rx - rSize) + 'px';
    ring.style.top  = (ry - rSize) + 'px';
    // トムとジェリーの距離を計算 → 近づいたらやられ顔
    var dist = Math.sqrt((rx - mx) * (rx - mx) + (ry - my) * (ry - my));
    if (dist < 14) {
      document.body.classList.add('cat-caught');
    } else {
      document.body.classList.remove('cat-caught');
    }
    requestAnimationFrame(lerp);
  })();

  // リンク・ボタン: VIEW
  document.querySelectorAll('a, button').forEach(function(el) {
    el.addEventListener('mouseenter', function() {
      if (ringText) ringText.textContent = 'VIEW';
      document.body.classList.add('cursor-hover');
      document.body.classList.remove('cursor-hover-card');
    });
    el.addEventListener('mouseleave', function() {
      document.body.classList.remove('cursor-hover');
    });
  });

  // カード: MORE
  document.querySelectorAll('.feature-card, .news-item').forEach(function(el) {
    el.addEventListener('mouseenter', function() {
      if (ringText) ringText.textContent = 'MORE';
      document.body.classList.add('cursor-hover-card');
      document.body.classList.remove('cursor-hover');
    });
    el.addEventListener('mouseleave', function() {
      document.body.classList.remove('cursor-hover-card');
    });
  });
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

<div class="cursor-ring" id="cursorRing"><span class="cursor-ring-text" id="cursorRingText">VIEW</span></div>
<div class="cursor-dot" id="cursorDot"></div>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
