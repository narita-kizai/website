<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<script>window._pageStart=Date.now();</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$_ogTitle = isset($pageTitle) ? htmlspecialchars($pageTitle).' | 成田機材株式会社' : '成田機材株式会社 – Piping & Housing';
$_ogDesc  = isset($pageDesc)  ? htmlspecialchars($pageDesc)  : '千葉県富里市・茂原市に拠点を置く配管機材・住宅資材の専門商社。豊富な在庫と迅速な配送で地域の工事業者様を支えています。';
$_ogImg   = isset($pageOgImg) ? $pageOgImg : 'https://narita-kizai.com/narita_logo_512x512_2.png';
$_ogUrl   = 'https://narita-kizai.com' . $_SERVER['REQUEST_URI'];
?>
<title><?= $_ogTitle ?></title>
<meta name="description" content="<?= $_ogDesc ?>">
<!-- OGP -->
<meta property="og:type"        content="website">
<meta property="og:site_name"   content="成田機材株式会社">
<meta property="og:title"       content="<?= $_ogTitle ?>">
<meta property="og:description" content="<?= $_ogDesc ?>">
<meta property="og:image"       content="<?= htmlspecialchars($_ogImg) ?>">
<meta property="og:url"         content="<?= htmlspecialchars($_ogUrl) ?>">
<meta property="og:locale"      content="ja_JP">
<meta name="twitter:card"       content="summary_large_image">
<meta name="twitter:site"       content="@narita_kizai">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon-32.png" type="image/png" sizes="32x32">
<link rel="icon" href="/favicon-16.png" type="image/png" sizes="16x16">
<link rel="apple-touch-icon" href="/favicon-180.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;600;700&family=Noto+Sans+JP:wght@400;500;700&family=Bebas+Neue&display=swap" rel="stylesheet">
<style>
:root {
  --navy: #1a2744;
  --navy-light: #243460;
  --accent: #c8a95a;
  --accent-light: #e8c97a;
  --gray-100: #f7f7f5;
  --gray-200: #eeede9;
  --gray-500: #888880;
  --gray-700: #444440;
  --white: #ffffff;
  --text: #2a2a28;
  --serif: 'Noto Serif JP', serif;
  --sans: 'Noto Sans JP', sans-serif;
  --display: 'Bebas Neue', sans-serif;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {
  font-family: var(--sans);
  color: var(--text);
  background: var(--white);
  line-height: 1.8;
  font-size: 15px;
  cursor: url('mouse-follower.svg') 16 21, auto;
}

/* ─── TOPBAR ─── */
.topbar {
  display: none;
}
.topbar-inner {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  justify-content: flex-end;
  gap: 24px;
  align-items: center;
}
.topbar a { color: rgba(255,255,255,0.7); text-decoration: none; }
.topbar a:hover { color: var(--accent); }

/* ─── HEADER ─── */
header {
  background: transparent;
  border-bottom: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  transition: background 0.4s, box-shadow 0.4s, border-bottom 0.4s;
}
header.scrolled {
  background: var(--white);
  border-bottom: 3px solid var(--navy);
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

/* ヘッダーが透明の時はロゴ・ナビを白色に */
header:not(.scrolled) .logo-main { color: var(--white); }
header:not(.scrolled) .logo-sub { color: var(--accent-light); }
header:not(.scrolled) .nav-link { color: rgba(255,255,255,0.88); }
header:not(.scrolled) .nav-link:hover,
header:not(.scrolled) .nav-link.active {
  background: rgba(255,255,255,0.15);
  color: var(--white);
}
header:not(.scrolled) .hamburger span { background: var(--white); }
/* コンテンツページではヘッダーを常にsolid */
body.inner-page header {
  background: rgba(255,255,255,0.85);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  border-bottom: 1px solid rgba(26,39,68,0.12);
  box-shadow: 0 2px 20px rgba(0,0,0,0.06);
}
body.inner-page header .logo-main { color: var(--navy); }
body.inner-page header .logo-sub { color: var(--accent); }
body.inner-page header .nav-link { color: var(--navy); }
body.inner-page header .nav-link:hover,
body.inner-page header .nav-link.active { background: var(--navy); color: var(--white); }
body.inner-page header .hamburger span { background: var(--navy); }
.header-inner {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 88px;
}
.logo {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 16px;
  text-decoration: none;
}
.logo-img {
  height: 64px;
  width: auto;
  display: block;
  flex-shrink: 0;
}
.logo-text {
  display: flex;
  flex-direction: column;
}
.logo-main {
  font-family: var(--serif);
  font-weight: 700;
  font-size: 22px;
  color: var(--navy);
  letter-spacing: 0.05em;
  line-height: 1.2;
}
.logo-sub {
  font-family: var(--display);
  font-size: 14px;
  color: var(--accent);
  letter-spacing: 0.2em;
}

/* ─── NAV ─── */
nav { display: flex; align-items: center; gap: 4px; }
.nav-item {
  position: relative;
}
.nav-link {
  display: block;
  padding: 8px 14px;
  font-size: 13px;
  font-weight: 700;
  color: var(--navy);
  text-decoration: none;
  letter-spacing: 0.04em;
  white-space: nowrap;
  border-radius: 3px;
  transition: background 0.2s, color 0.2s;
}
.nav-link:hover, .nav-link.active {
  background: var(--navy);
  color: var(--white);
}
.nav-link.has-dropdown::after {
  content: ' ▾';
  font-size: 10px;
}
.dropdown {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: var(--navy);
  min-width: 160px;
  border-top: 2px solid var(--accent);
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  z-index: 100;
}
.nav-item:hover .dropdown { display: block; }
.dropdown a {
  display: block;
  padding: 10px 16px;
  color: rgba(255,255,255,0.85);
  text-decoration: none;
  font-size: 13px;
  font-weight: 500;
  border-bottom: 1px solid rgba(255,255,255,0.08);
  transition: background 0.15s, color 0.15s;
}
.dropdown a:hover { background: var(--navy-light); color: var(--accent-light); }

/* ─── HAMBURGER ─── */
.hamburger { display: flex; flex-direction: column; gap: 6px; cursor: pointer; padding: 8px; z-index: 2100; position: relative; }
.hamburger span { display: block; width: 26px; height: 1.5px; background: var(--navy); transition: transform 0.45s cubic-bezier(0.77,0,0.175,1), opacity 0.3s, background 0.3s; }
.hamburger.menu-open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); background: var(--white); }
.hamburger.menu-open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.hamburger.menu-open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); background: var(--white); }
.mobile-nav { display: none; }

/* ─── FULL SCREEN MENU ─── */
.fullmenu {
  position: fixed;
  inset: 0;
  z-index: 2000;
  background: #0b1220;
  clip-path: inset(0 0 100% 0);
  transition: clip-path 0.75s cubic-bezier(0.77, 0, 0.175, 1);
  overflow-y: auto;
  pointer-events: none;
}
.fullmenu.open {
  clip-path: inset(0 0 0% 0);
  pointer-events: auto;
}
.fullmenu-inner {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 48px 56px;
}
.fullmenu-header {
  height: 88px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-shrink: 0;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.fullmenu-logo .logo-main { color: var(--white); font-family: var(--serif); }
.fullmenu-logo .logo-sub { color: var(--accent-light); }
.fullmenu-body {
  flex: 1;
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 64px;
  align-items: center;
  padding: 48px 0;
}
.fullmenu-nav ul { list-style: none; }
.fullmenu-nav li {
  border-bottom: 1px solid rgba(255,255,255,0.07);
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.65s cubic-bezier(0.16,1,0.3,1), transform 0.65s cubic-bezier(0.16,1,0.3,1);
}
.fullmenu.open .fullmenu-nav li { opacity: 1; transform: none; }
.fullmenu.open .fullmenu-nav li:nth-child(1) { transition-delay: 0.20s; }
.fullmenu.open .fullmenu-nav li:nth-child(2) { transition-delay: 0.30s; }
.fullmenu.open .fullmenu-nav li:nth-child(3) { transition-delay: 0.40s; }
.fullmenu.open .fullmenu-nav li:nth-child(4) { transition-delay: 0.50s; }
.fullmenu-nav a {
  display: flex;
  align-items: center;
  gap: 20px;
  padding: 20px 0;
  text-decoration: none;
  color: var(--white);
  transition: color 0.2s, padding-left 0.35s cubic-bezier(0.16,1,0.3,1);
}
.fullmenu-nav a:hover { color: var(--accent); padding-left: 14px; }
.fn-num {
  font-family: var(--display);
  font-size: 12px;
  color: var(--accent);
  letter-spacing: 0.12em;
  opacity: 0.8;
  min-width: 28px;
}
.fn-en {
  font-family: var(--display);
  font-size: clamp(44px, 6vw, 76px);
  letter-spacing: 0.04em;
  line-height: 1;
}
.fn-ja {
  font-family: var(--serif);
  font-size: 13px;
  color: rgba(255,255,255,0.40);
  letter-spacing: 0.15em;
}
.fullmenu-info {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.6s, transform 0.6s;
  transition-delay: 0.55s;
}
.fullmenu.open .fullmenu-info { opacity: 1; transform: none; }
.fullmenu-info-label {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.4em;
  color: var(--accent);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.fullmenu-info-label::before {
  content: '';
  display: block;
  width: 24px;
  height: 1px;
  background: var(--accent);
}
.fullmenu-info address {
  font-style: normal;
  color: rgba(255,255,255,0.72);
  font-size: 13px;
  line-height: 2.1;
  margin-bottom: 28px;
}
.fullmenu-info address strong {
  color: rgba(255,255,255,0.90);
}
.fullmenu-info address a {
  color: rgba(255,255,255,0.72);
  text-decoration: none;
  transition: color 0.2s;
}
.fullmenu-info address a:hover { color: var(--accent-light); }
.fullmenu-sns {
  display: flex;
  gap: 12px;
  margin-top: 8px;
}
.fullmenu-sns a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border: 1px solid rgba(255,255,255,0.18);
  color: rgba(255,255,255,0.55);
  text-decoration: none;
  font-size: 14px;
  font-family: var(--display);
  letter-spacing: 0;
  transition: border-color 0.2s, color 0.2s, background 0.2s;
}
.fullmenu-sns a:hover {
  border-color: var(--accent);
  color: var(--accent);
  background: rgba(200,169,90,0.08);
}
.fullmenu-sns .sns-x {
  background: #000;
  border-color: rgba(255,255,255,0.4);
  color: #fff;
}
.fullmenu-sns .sns-x:hover {
  background: #333;
  border-color: rgba(255,255,255,0.7);
  color: #fff;
}
.fullmenu-sns .sns-yt {
  background: #ff0000;
  border-color: #ff0000;
  color: #fff;
}
.fullmenu-sns .sns-yt:hover {
  background: #cc0000;
  border-color: #cc0000;
  color: #fff;
}
.fullmenu-close {
  background: none;
  border: 1px solid rgba(255,255,255,0.20);
  width: 48px;
  height: 48px;
  cursor: pointer;
  position: relative;
  flex-shrink: 0;
  transition: border-color 0.25s, background 0.25s;
}
.fullmenu-close::before,
.fullmenu-close::after {
  content: '';
  position: absolute;
  top: 50%; left: 50%;
  width: 20px; height: 1.5px;
  background: rgba(255,255,255,0.75);
  transition: background 0.25s;
}
.fullmenu-close::before { transform: translate(-50%,-50%) rotate(45deg); }
.fullmenu-close::after  { transform: translate(-50%,-50%) rotate(-45deg); }
.fullmenu-close:hover {
  border-color: var(--accent);
  background: rgba(200,169,90,0.10);
}
.fullmenu-close:hover::before,
.fullmenu-close:hover::after { background: var(--accent); }
.fullmenu-footer {
  border-top: 1px solid rgba(255,255,255,0.07);
  padding-top: 24px;
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.2em;
  color: rgba(255,255,255,0.2);
}
@media (max-width: 768px) {
  .fullmenu-inner { padding: 0 24px 48px; }
  .fullmenu-body {
    display: flex;
    flex-direction: column;
    gap: 24px;
    padding: 16px 0;
  }
  .fullmenu-nav { width: 100%; }
  .fn-en { font-size: 38px; }
  .fullmenu-nav a { padding: 13px 0; gap: 12px; }
  .fullmenu-info { width: 100%; padding-bottom: 16px; }
}

/* ─── PAGE SECTIONS ─── */
.page { display: none; }
.page.active { display: block; }

/* ─── FULLSCREEN VIDEO HERO ─── */
.hero-video {
  position: relative;
  width: 100%;
  height: 100vh;
  min-height: 560px;
  overflow: hidden;
  background: var(--navy);
  display: flex;
  align-items: center;
  justify-content: center;
}
.hero-video video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.hero-video-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    160deg,
    rgba(10,20,50,0.72) 0%,
    rgba(10,20,50,0.38) 60%,
    rgba(10,20,50,0.55) 100%
  );
}
.hero-video-content {
  position: relative;
  z-index: 2;
  color: var(--white);
  text-align: left;
  max-width: 1100px;
  width: 100%;
  padding: 0 48px;
  padding-top: 80px; /* ヘッダー透明分 */
}
.hero-video-catch {
  font-family: var(--display);
  font-size: clamp(13px, 1.5vw, 15px);
  letter-spacing: 0.45em;
  color: var(--accent);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 16px;
}
.hero-video-catch::before {
  content: '';
  display: block;
  width: 40px;
  height: 1px;
  background: var(--accent);
}
.hero-video-title {
  font-family: var(--serif);
  font-size: clamp(44px, 7.5vw, 100px);
  font-weight: 700;
  line-height: 1.15;
  text-shadow: 0 2px 24px rgba(0,0,0,0.4);
  margin-bottom: 28px;
  letter-spacing: -0.01em;
}
.hero-video-sub {
  font-size: clamp(14px, 1.5vw, 16px);
  color: rgba(255,255,255,0.75);
  line-height: 1.9;
  max-width: 480px;
  margin-bottom: 40px;
}
.hero-video-scroll {
  position: absolute;
  bottom: 80px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  color: rgba(255,255,255,0.5);
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.3em;
  z-index: 2;
  animation: scrollBounce 2s infinite;
}
.hero-video-scroll::after {
  content: '';
  display: block;
  width: 1px;
  height: 48px;
  background: linear-gradient(to bottom, rgba(255,255,255,0.5), transparent);
}
@keyframes scrollBounce {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50% { transform: translateX(-50%) translateY(8px); }
}

/* ─── HERO (旧スライダー非表示) ─── */
.hero { display: none; }

/* ─── FEATURES ─── */
.features {
  background: var(--navy);
  padding: 40px 24px;
}
.features-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 2px;
}
.feature-card {
  background: var(--navy-light);
  padding: 32px 28px;
  text-align: center;
  transition: background 0.2s;
}
.feature-card:hover { background: #2d4080; }
.feature-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  margin-bottom: 20px;
  border-radius: 2px;
}
.feature-card h3 {
  font-family: var(--serif);
  font-size: 16px;
  color: var(--accent-light);
  margin-bottom: 8px;
  letter-spacing: 0.05em;
}
.feature-card p {
  font-size: 13px;
  color: rgba(255,255,255,0.7);
  line-height: 1.7;
}

/* ─── NEWS ─── */
.news-section {
  padding: 72px 24px 80px;
  background: #0d1528;
}
/* ダーク背景上のセクションヘッダー */
.news-section .section-header {
  border-bottom-color: rgba(255,255,255,0.10);
}
.news-section .section-title-en {
  color: var(--white);
}
.news-section .section-title-ja {
  color: rgba(255,255,255,0.45);
}
.news-section .section-title-ja::before {
  background: var(--accent);
}
.news-section .section-bg-text {
  color: rgba(255,255,255,0.04);
}
/* ネイビーカード（トップページNEWSセクション・ニュース一覧ページ共通） */
.news-dark .news-card,
#newsGrid .news-card {
  background: var(--navy-light);
  border-color: rgba(255,255,255,0.08);
}
.news-dark .news-card:hover,
#newsGrid .news-card:hover {
  box-shadow: 0 20px 48px rgba(0,0,0,0.25);
  transform: translateY(-6px);
}
.news-dark .news-card .news-title,
#newsGrid .news-card .news-title {
  color: var(--white);
}
.news-dark .news-card .news-excerpt,
#newsGrid .news-card .news-excerpt {
  color: rgba(255,255,255,0.55);
}
.news-dark .news-card .news-date,
#newsGrid .news-card .news-date {
  color: rgba(255,255,255,0.45);
}
.news-dark .news-card .news-cat,
#newsGrid .news-card .news-cat {
  background: var(--accent);
  color: #0d1528;
}
.section-inner { max-width: 1100px; margin: 0 auto; }
.section-header {
  display: flex;
  align-items: baseline;
  gap: 16px;
  margin-bottom: 40px;
  border-bottom: 2px solid var(--navy);
  padding-bottom: 16px;
}
.section-title-en {
  font-family: var(--display);
  font-size: clamp(52px, 8vw, 96px);
  color: var(--navy);
  letter-spacing: 0.06em;
  line-height: 1;
  display: block;
}
.section-title-ja {
  font-family: var(--serif);
  font-size: 14px;
  color: var(--gray-500);
  letter-spacing: 0.1em;
  display: flex;
  align-items: center;
  gap: 12px;
  margin-top: 6px;
}
.section-title-ja::before {
  content: '';
  display: block;
  width: 28px;
  height: 1px;
  background: var(--accent);
  flex-shrink: 0;
}
.news-list { display: flex; flex-direction: column; gap: 0; }
.news-item {
  display: grid;
  grid-template-columns: 200px 1fr;
  gap: 24px;
  align-items: start;
  padding: 24px 0;
  border-bottom: 1px solid var(--gray-200);
  text-decoration: none;
  color: var(--text);
  transition: background 0.2s;
}
.news-item:hover { background: var(--gray-200); margin: 0 -16px; padding-left: 16px; padding-right: 16px; }
.news-img {
  width: 100%;
  height: 120px;
  object-fit: cover;
  border-radius: 2px;
}
.news-meta { display: flex; gap: 12px; align-items: center; margin-bottom: 8px; }
.news-date { font-size: 12px; color: var(--gray-500); }
.news-cat {
  font-size: 11px;
  background: var(--navy);
  color: var(--white);
  padding: 2px 8px;
  border-radius: 2px;
  letter-spacing: 0.05em;
}
.news-title {
  font-family: var(--serif);
  font-size: 15px;
  font-weight: 600;
  line-height: 1.6;
}
.news-excerpt { font-size: 13px; color: var(--gray-500); margin-top: 6px; }

/* ─── CONTENT PAGES ─── */
.page-hero {
  background: var(--navy);
  padding: 120px 24px 56px;
  position: relative;
  overflow: hidden;
}
.page-hero::before {
  content: '';
  position: absolute;
  right: -80px;
  top: -80px;
  width: 320px;
  height: 320px;
  border: 40px solid rgba(200,169,90,0.12);
  border-radius: 50%;
}
.page-hero::after {
  content: '';
  position: absolute;
  right: 40px;
  bottom: -40px;
  width: 160px;
  height: 160px;
  border: 24px solid rgba(200,169,90,0.08);
  border-radius: 50%;
}
.page-hero-inner { max-width: 1100px; margin: 0 auto; position: relative; }
.breadcrumb {
  display: flex;
  gap: 8px;
  align-items: center;
  font-size: 12px;
  color: rgba(255,255,255,0.5);
  margin-bottom: 16px;
}
.breadcrumb a { color: rgba(255,255,255,0.5); text-decoration: none; }
.breadcrumb a:hover { color: var(--accent-light); }
.breadcrumb span { color: rgba(255,255,255,0.3); }
.page-title {
  font-family: var(--serif);
  font-size: clamp(24px, 4vw, 36px);
  font-weight: 700;
  color: var(--white);
  letter-spacing: 0.05em;
}
.page-title-en {
  font-family: var(--display);
  font-size: 14px;
  color: var(--accent);
  letter-spacing: 0.3em;
  margin-top: 8px;
}

.content-area {
  max-width: 1100px;
  margin: 0 auto;
  padding: 64px 24px;
}

/* ─── DATA TABLE ─── */
.data-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 40px;
}
.data-table th, .data-table td {
  padding: 14px 20px;
  border-bottom: 1px solid var(--gray-200);
  vertical-align: top;
  line-height: 1.8;
  font-size: 14px;
}
.data-table th {
  width: 200px;
  font-weight: 700;
  color: var(--navy);
  font-family: var(--serif);
  background: var(--gray-100);
  white-space: nowrap;
}
.data-table td { color: var(--gray-700); }
.data-table tr:hover td { background: var(--gray-100); }

/* ─── SECTION BLOCK ─── */
.content-block {
  margin-bottom: 56px;
}
.content-block-title {
  font-family: var(--serif);
  font-size: 22px;
  font-weight: 700;
  color: var(--navy);
  border-left: 4px solid var(--accent);
  padding-left: 16px;
  margin-bottom: 24px;
}

/* ─── PHILOSOPHY ─── */
.philosophy-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.philosophy-item {
  display: flex;
  gap: 16px;
  align-items: flex-start;
  padding: 20px 24px;
  background: var(--gray-100);
  border-left: 3px solid var(--accent);
}
.philosophy-num {
  font-family: var(--display);
  font-size: 28px;
  color: var(--accent);
  line-height: 1;
  flex-shrink: 0;
  margin-top: 2px;
}
.philosophy-text {
  font-size: 14px;
  color: var(--gray-700);
  line-height: 1.9;
}

/* ─── PRESIDENT ─── */
.president-block {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 48px;
  align-items: start;
}
.president-flip {
  width: 100%;
  aspect-ratio: 3/4;
  perspective: 1200px;
  cursor: pointer;
}
.president-flip-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
@media (hover: hover) {
  .president-flip:hover .president-flip-inner {
    transform: rotateY(180deg);
  }
}
.president-flip.flipped .president-flip-inner {
  transform: rotateY(180deg);
}
.president-flip-front,
.president-flip-back {
  position: absolute;
  inset: 0;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}
.president-flip-back {
  transform: rotateY(180deg);
}
.president-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 2px;
  box-shadow: 8px 8px 0 var(--gray-200);
}
.president-text {
  font-size: 15px;
  line-height: 2;
  color: var(--gray-700);
}
.president-name {
  margin-top: 32px;
  text-align: right;
  font-family: var(--serif);
  font-size: 16px;
  color: var(--navy);
  font-weight: 700;
}
.president-name span {
  display: block;
  font-size: 12px;
  color: var(--gray-500);
  font-weight: 400;
  margin-bottom: 4px;
}

/* ─── HISTORY ─── */
.history-img {
  display: block;
  max-width: 560px;
  width: 100%;
  height: auto;
  margin: 0 auto 40px;
  border-radius: 4px;
  box-shadow: 4px 4px 0 var(--gray-200);
}
.timeline {
  position: relative;
  padding-left: 120px;
}
.timeline::before {
  content: '';
  position: absolute;
  left: 88px;
  top: 0;
  bottom: 0;
  width: 2px;
  background: var(--gray-200);
}
.timeline-item {
  position: relative;
  padding-bottom: 32px;
}
.timeline-item::before {
  content: '';
  position: absolute;
  left: -36px;
  top: 8px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--accent);
  border: 2px solid var(--white);
  box-shadow: 0 0 0 2px var(--accent);
}
.timeline-year {
  position: absolute;
  left: -120px;
  top: 4px;
  font-family: var(--serif);
  font-size: 13px;
  font-weight: 700;
  color: var(--navy);
  text-align: right;
  width: 80px;
  line-height: 1.4;
}
.timeline-content {
  font-size: 14px;
  color: var(--gray-700);
  line-height: 1.8;
}

/* ─── OFFICERS ─── */
.officers-table {
  width: 100%;
  border-collapse: collapse;
}
.officers-table tr {
  border-bottom: 1px solid var(--gray-200);
  transition: background 0.15s;
}
.officers-table tr:hover { background: var(--gray-100); }
.officers-table td {
  padding: 20px 24px;
  font-size: 15px;
}
.officers-table td:first-child {
  font-family: var(--serif);
  font-weight: 700;
  color: var(--navy);
  width: 220px;
  white-space: nowrap;
}
.officers-table td:last-child {
  color: var(--gray-700);
  letter-spacing: 0.05em;
}

/* ─── ASSOCIATE ─── */
.associate-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
  margin-bottom: 40px;
}
.associate-card {
  padding: 24px;
  border: 1px solid var(--gray-200);
  border-top: 3px solid var(--navy);
  border-radius: 2px;
}
.associate-card h4 {
  font-family: var(--serif);
  font-size: 16px;
  color: var(--navy);
  margin-bottom: 12px;
}
.associate-card a {
  color: var(--navy);
  text-decoration: none;
  border-bottom: 1px solid var(--accent);
}
.associate-card a:hover { color: var(--accent); }
.associate-card table { width: 100%; }
.associate-card table td {
  padding: 4px 0;
  font-size: 13px;
  color: var(--gray-700);
  vertical-align: top;
}
.associate-card table td:first-child {
  font-weight: 700;
  color: var(--navy);
  width: 80px;
  white-space: nowrap;
}

.related-table { width: 100%; border-collapse: collapse; }
.related-table tr { border-bottom: 1px solid var(--gray-200); }
.related-table td { padding: 14px 16px; font-size: 14px; color: var(--gray-700); }
.related-table td a { color: var(--navy); text-decoration: none; border-bottom: 1px solid var(--accent); }
.related-table td a:hover { color: var(--accent); }

/* ─── ITEMS ─── */
.items-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 24px;
}
.item-card {
  border: 1px solid var(--gray-200);
  border-radius: 2px;
  overflow: hidden;
  transition: box-shadow 0.2s, transform 0.2s;
}
.item-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.1); transform: translateY(-2px); }
.item-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}
.item-card-body { padding: 20px; }
.item-card-title {
  font-family: var(--serif);
  font-size: 16px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 10px;
  border-left: 3px solid var(--accent);
  padding-left: 10px;
}
.item-card-text { font-size: 13px; color: var(--gray-500); line-height: 1.7; }

/* ─── ACCESS ─── */
.access-block {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto 1fr;
  gap: 24px;
  margin-bottom: 64px;
  align-items: start;
}
.access-photo {
  grid-column: 1;
  grid-row: 1 / 3;
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
  border-radius: 2px;
}
.access-card {
  grid-column: 2;
  grid-row: 1;
  padding: 28px;
  background: var(--gray-100);
  border-top: 3px solid var(--navy);
}
.access-card h3 {
  font-family: var(--serif);
  font-size: 18px;
  color: var(--navy);
  margin-bottom: 16px;
}
.access-card address {
  font-style: normal;
  font-size: 14px;
  color: var(--gray-700);
  line-height: 2;
}
.access-card address strong { color: var(--navy); }
.map-container {
  grid-column: 2;
  grid-row: 2;
  width: 100%;
  height: 100%;
  min-height: 260px;
  border-radius: 2px;
  overflow: hidden;
}
.map-container iframe { width: 100%; height: 100%; border: 0; }

/* ─── RECRUIT ─── */

/* キャッチセクション */
.rec-catch-section {
  background: var(--gray-100);
  padding: 80px 24px;
  text-align: center;
}
.rec-catch-inner {
  max-width: 800px;
  margin: 0 auto;
}
.rec-catch-label {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.5em;
  color: var(--accent);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}
.rec-catch-label::before,
.rec-catch-label::after {
  content: '';
  display: block;
  width: 32px;
  height: 1px;
  background: var(--accent);
  flex-shrink: 0;
}
.rec-catch-title {
  font-family: var(--serif);
  font-size: clamp(22px, 4vw, 38px);
  font-weight: 700;
  line-height: 1.7;
  color: var(--navy);
  margin-bottom: 24px;
}
.rec-catch-body {
  font-size: 15px;
  line-height: 2;
  color: var(--gray-700);
}

/* 数字セクション */
.rec-numbers-section {
  background: var(--navy);
  padding: 80px 24px;
  overflow: hidden;
}
.rec-numbers-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.rec-numbers-section .section-header {
  border-bottom-color: rgba(255,255,255,0.10);
}
.rec-numbers-section .section-title-en {
  color: var(--white);
}
.rec-numbers-section .section-title-ja {
  color: rgba(255,255,255,0.45);
}
.rec-numbers-section .section-title-ja::before {
  background: var(--accent);
}
.rec-numbers-section .section-bg-text {
  color: rgba(255,255,255,0.04);
}
.rec-numbers-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
}
.rec-number-card {
  background: rgba(255,255,255,0.04);
  padding: 40px 24px;
  text-align: center;
  border: 1px solid rgba(200,169,90,0.15);
}
.rec-number-value {
  font-family: var(--display);
  font-size: clamp(52px, 8vw, 80px);
  color: var(--accent);
  line-height: 1;
}
.rec-number-unit {
  font-size: 14px;
  color: var(--accent-light);
  margin-top: 4px;
}
.rec-number-label {
  font-size: 12px;
  color: rgba(255,255,255,0.45);
  letter-spacing: 0.1em;
  margin-top: 10px;
}

/* インタビューセクション */
.rec-interview-section {
  background: var(--white);
  padding: 80px 24px;
}
.rec-interview-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.rec-interview-list {
  display: flex;
  flex-direction: column;
  gap: 72px;
}
.rec-interview-card {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 56px;
  align-items: start;
}
.rec-interview-card:nth-child(even) {
  grid-template-columns: 1fr 280px;
}
.rec-interview-card:nth-child(even) .rec-int-photo { order: 2; }
.rec-interview-card:nth-child(even) .rec-int-body  { order: 1; }
.rec-int-photo {
  position: relative;
  flex-shrink: 0;
}
.rec-int-photo img {
  width: 100%;
  aspect-ratio: 3 / 4;
  object-fit: cover;
  display: block;
  border-radius: 2px;
}
.rec-int-photo-label {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(0deg, rgba(26,39,68,0.95) 0%, rgba(26,39,68,0.5) 100%);
  padding: 14px 16px;
}
.rec-int-name {
  font-family: var(--serif);
  font-size: 16px;
  color: var(--white);
  font-weight: 700;
}
.rec-int-role {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.3em;
  color: var(--accent);
  display: block;
  margin-top: 4px;
}
.rec-int-body {
  padding-top: 4px;
}
.rec-int-tag {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.4em;
  color: var(--accent);
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.rec-int-tag::before {
  content: '';
  display: block;
  width: 32px;
  height: 1px;
  background: var(--accent);
  flex-shrink: 0;
}
.rec-int-qas {
  display: flex;
  flex-direction: column;
  gap: 28px;
}
.rec-int-qa-q {
  font-family: var(--serif);
  font-size: 16px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 10px;
  padding-left: 14px;
  border-left: 3px solid var(--accent);
  line-height: 1.6;
}
.rec-int-qa-a {
  font-size: 14px;
  line-height: 2;
  color: var(--gray-700);
}

/* タイムラインセクション */
.rec-timeline-section {
  background: var(--navy);
  padding: 80px 24px;
  overflow: hidden;
}
.rec-timeline-inner {
  max-width: 800px;
  margin: 0 auto;
}
.rec-timeline-section .section-header {
  border-bottom-color: rgba(255,255,255,0.10);
}
.rec-timeline-section .section-title-en {
  color: var(--white);
}
.rec-timeline-section .section-title-ja {
  color: rgba(255,255,255,0.45);
}
.rec-timeline-section .section-title-ja::before {
  background: var(--accent);
}
.rec-timeline-section .section-bg-text {
  color: rgba(255,255,255,0.04);
}
.rec-timeline-caption {
  font-size: 12px;
  letter-spacing: 0.2em;
  color: rgba(255,255,255,0.4);
  margin-bottom: 40px;
  text-align: center;
}
.rec-timeline {
  position: relative;
}
.rec-timeline::before {
  content: '';
  position: absolute;
  top: 10px;
  bottom: 10px;
  left: 70px;
  width: 1px;
  background: rgba(200,169,90,0.25);
}
.rec-tl-item {
  display: flex;
  gap: 20px;
  align-items: flex-start;
  padding: 16px 0;
}
.rec-tl-time {
  font-family: var(--display);
  font-size: 16px;
  color: var(--accent);
  width: 50px;
  flex-shrink: 0;
  text-align: right;
  padding-top: 2px;
  letter-spacing: 0.05em;
}
.rec-tl-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--accent);
  flex-shrink: 0;
  margin-top: 6px;
  position: relative;
  z-index: 1;
}
.rec-tl-content {
  flex: 1;
  padding-bottom: 16px;
  border-bottom: 1px solid rgba(255,255,255,0.06);
}
.rec-tl-item:last-child .rec-tl-content {
  border-bottom: none;
}
.rec-tl-title {
  font-size: 15px;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 4px;
}
.rec-tl-desc {
  font-size: 13px;
  color: rgba(255,255,255,0.55);
  line-height: 1.7;
}

/* 募集要項セクション */
.rec-jobs-section {
  background: var(--gray-100);
  padding: 80px 24px;
}
.rec-jobs-inner {
  max-width: 900px;
  margin: 0 auto;
}
/* 共通情報バー */
.rec-jobs-common {
  display: flex;
  flex-wrap: wrap;
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 48px;
}
.rec-jobs-common-item {
  flex: 1 1 140px;
  padding: 20px 24px;
  border-right: 1px solid var(--gray-200);
  text-align: center;
}
.rec-jobs-common-item:last-child { border-right: none; }
.rec-jobs-common-label {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.08em;
  color: var(--accent);
  text-transform: uppercase;
  margin-bottom: 6px;
}
.rec-jobs-common-value {
  font-size: 14px;
  font-weight: 700;
  color: var(--navy);
  line-height: 1.6;
}
/* 職種グリッド */
.rec-role-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-bottom: 32px;
}
.rec-role-card {
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-top: 3px solid var(--accent);
  border-radius: 4px;
  padding: 28px 24px;
}
.rec-role-en {
  font-family: var(--display);
  font-size: 22px;
  letter-spacing: 0.06em;
  color: var(--navy);
  margin-bottom: 4px;
}
.rec-role-ja {
  font-family: var(--serif);
  font-size: 17px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid var(--gray-200);
}
.rec-role-desc {
  font-size: 13px;
  color: var(--gray-700);
  line-height: 1.85;
  margin: 0;
}
.rec-jobs-note {
  font-size: 12px;
  color: var(--text-sub);
  text-align: center;
  margin: 0 0 28px;
}
.rec-jobs-link-wrap { text-align: center; }
.rec-jobs-link {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: var(--navy);
  color: var(--white);
  font-size: 14px;
  font-weight: 700;
  letter-spacing: 0.04em;
  padding: 16px 48px;
  border-radius: 2px;
  text-decoration: none;
  transition: background 0.2s, transform 0.2s;
}
.rec-jobs-link:hover {
  background: #263a6e;
  transform: translateY(-2px);
  color: var(--white);
}
.rec-jobs-link-arrow { transition: transform 0.2s; }
.rec-jobs-link:hover .rec-jobs-link-arrow { transform: translateX(4px); }

/* CTAセクション */
.rec-cta-section {
  background: var(--navy);
  padding: 80px 24px;
  text-align: center;
}
.rec-cta-inner {
  max-width: 640px;
  margin: 0 auto;
}
.rec-cta-label {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.5em;
  color: var(--accent);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}
.rec-cta-label::before,
.rec-cta-label::after {
  content: '';
  display: block;
  width: 32px;
  height: 1px;
  background: var(--accent);
  flex-shrink: 0;
}
.rec-cta-title {
  font-family: var(--serif);
  font-size: clamp(22px, 3vw, 30px);
  color: var(--white);
  font-weight: 700;
  line-height: 1.7;
  margin-bottom: 16px;
}
.rec-cta-body {
  font-size: 14px;
  color: rgba(255,255,255,0.6);
  line-height: 2;
  margin-bottom: 40px;
}
.rec-cta-btns {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}
.rec-cta-contact {
  margin-top: 40px;
  padding-top: 40px;
  border-top: 1px solid rgba(255,255,255,0.12);
}
.rec-cta-btn-primary {
  display: inline-block;
  padding: 16px 48px;
  background: var(--accent);
  color: var(--navy);
  font-family: var(--display);
  font-size: 14px;
  letter-spacing: 0.2em;
  text-decoration: none;
  border-radius: 2px;
  font-weight: 700;
  transition: background 0.2s, transform 0.2s;
}
.rec-cta-btn-primary:hover {
  background: var(--accent-light);
  transform: translateY(-2px);
}
.rec-cta-btn-secondary {
  display: inline-block;
  padding: 16px 48px;
  border: 1px solid rgba(255,255,255,0.4);
  color: rgba(255,255,255,0.8);
  font-family: var(--display);
  font-size: 14px;
  letter-spacing: 0.2em;
  text-decoration: none;
  border-radius: 2px;
  transition: border-color 0.2s, color 0.2s, transform 0.2s;
}
.rec-cta-btn-secondary:hover {
  border-color: var(--white);
  color: var(--white);
  transform: translateY(-2px);
}
/* ハローワーク番号ボックス */
.rec-hw-box {
  margin-top: 48px;
  padding-top: 36px;
  border-top: 1px solid rgba(255,255,255,0.12);
}
.rec-hw-title {
  font-family: var(--display);
  font-size: 14px;
  letter-spacing: 0.3em;
  color: rgba(255,255,255,0.75);
  margin-bottom: 20px;
}
.rec-hw-table {
  display: inline-block;
  text-align: left;
  margin-bottom: 20px;
}
.rec-hw-row {
  display: flex;
  gap: 28px;
  margin-bottom: 8px;
  align-items: flex-start;
}
.rec-hw-row:last-child { margin-bottom: 0; }
.rec-hw-key {
  font-size: 14px;
  color: rgba(255,255,255,0.65);
  white-space: nowrap;
  min-width: 80px;
  padding-top: 4px;
}
.rec-hw-val {
  font-family: 'Courier New', monospace;
  font-size: 22px;
  letter-spacing: 0.08em;
  color: var(--white);
  line-height: 1.7;
}
.rec-hw-note {
  margin-top: 0;
  margin-bottom: 28px;
  font-size: 13px;
  color: rgba(255,255,255,0.55);
  line-height: 1.9;
}
/* フォトモザイク */
.rec-mosaic-section {
  background: #0d1630;
  padding: 6px;
}
.rec-mosaic-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: 300px 300px 280px;
  gap: 6px;
  max-width: 1200px;
  margin: 0 auto;
}
.rec-mosaic-item {
  overflow: hidden;
  position: relative;
  background: #1a2744;
}
.rec-mosaic-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.7s cubic-bezier(0.4,0,0.2,1);
}
.rec-mosaic-item::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 0px solid var(--accent);
  transition: border-width 0.3s;
  pointer-events: none;
}
.rec-mosaic-item:hover img { transform: scale(1.06); }
.rec-mosaic-item:hover::after { border-width: 3px; }
.rec-mosaic-tall { grid-row: span 2; }
.rec-mosaic-wide { grid-column: span 3; }
.rec-mosaic-wide img { object-position: center top; }

/* RECRUIT パララックス調整 */
.rec-parallax::before {
  background: linear-gradient(160deg, rgba(10,20,50,0.78) 0%, rgba(10,20,50,0.55) 100%);
}
.rec-parallax .parallax-title {
  margin-bottom: 0;
}

/* RECRUIT レスポンシブ */
@media (max-width: 768px) {
  .rec-numbers-grid { grid-template-columns: repeat(2, 1fr); }
  .rec-interview-card,
  .rec-interview-card:nth-child(even) {
    grid-template-columns: 1fr;
  }
  .rec-interview-card:nth-child(even) .rec-int-photo { order: 0; }
  .rec-interview-card:nth-child(even) .rec-int-body  { order: 0; }
  .rec-int-photo img { aspect-ratio: 16 / 9; }
  .rec-jobs-common-item { border-right: none; border-bottom: 1px solid var(--gray-200); text-align: left; }
  .rec-jobs-common-item:last-child { border-bottom: none; }
  .rec-role-grid { grid-template-columns: 1fr; }
  .rec-mosaic-grid {
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: 180px 180px 180px;
  }
  .rec-mosaic-tall { grid-row: span 1; }
  .rec-mosaic-wide { grid-column: span 2; }
  .rec-timeline::before { left: 50px; }
  .rec-cta-btn-primary,
  .rec-cta-btn-secondary { padding: 14px 32px; width: 100%; text-align: center; }
}

/* ─── FOOTER ─── */
footer {
  background: var(--navy);
  color: rgba(255,255,255,0.7);
  padding: 56px 24px 24px;
}
.footer-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 48px;
  padding-bottom: 40px;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  margin-bottom: 24px;
}
.footer-brand .logo-main { color: var(--white); font-size: 20px; }
.footer-brand p { font-size: 13px; margin-top: 12px; line-height: 1.9; }
.footer-brand address {
  font-style: normal;
  font-size: 13px;
  margin-top: 16px;
  line-height: 2;
}
.footer-brand a { color: var(--accent-light); text-decoration: none; }
.footer-nav h4 {
  font-family: var(--display);
  font-size: 14px;
  color: var(--accent);
  letter-spacing: 0.2em;
  margin-bottom: 16px;
}
.footer-nav ul { list-style: none; }
.footer-nav li { margin-bottom: 8px; }
.footer-nav a {
  color: rgba(255,255,255,0.6);
  text-decoration: none;
  font-size: 13px;
  transition: color 0.2s;
}
.footer-nav a:hover { color: var(--accent-light); }
.footer-sns-link {
  display: flex;
  align-items: center;
  gap: 8px;
}
.footer-sns-icon {
  width: 14px;
  height: 14px;
  flex-shrink: 0;
  opacity: 0.6;
  transition: opacity 0.2s;
}
.footer-sns-link:hover .footer-sns-icon { opacity: 1; }
.footer-copy {
  text-align: center;
  font-size: 12px;
  color: rgba(255,255,255,0.3);
}


/* ─── PARALLAX ─── */
.parallax-section {
  position: relative;
  height: 420px;
  background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1600&q=80');
  background-attachment: fixed;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}
.parallax-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, rgba(10,20,50,0.72) 0%, rgba(10,20,50,0.48) 100%);
}
.parallax-content {
  position: relative;
  z-index: 1;
  text-align: center;
  color: var(--white);
  padding: 0 24px;
}
.parallax-catch {
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.5em;
  color: var(--accent);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  margin-bottom: 24px;
}
.parallax-catch::before,
.parallax-catch::after {
  content: '';
  display: block;
  width: 40px;
  height: 1px;
  background: var(--accent);
}
.parallax-title {
  font-family: var(--serif);
  font-size: clamp(22px, 3.5vw, 40px);
  font-weight: 700;
  line-height: 1.7;
  text-shadow: 0 2px 20px rgba(0,0,0,0.5);
  margin-bottom: 32px;
}
.parallax-nums {
  display: flex;
  gap: 48px;
  justify-content: center;
  flex-wrap: wrap;
}
.parallax-num {
  text-align: center;
}
.parallax-num-value {
  font-family: var(--display);
  font-size: clamp(40px, 5vw, 64px);
  color: var(--accent-light);
  line-height: 1;
  letter-spacing: 0.05em;
}
.parallax-num-label {
  font-size: 12px;
  color: rgba(255,255,255,0.7);
  letter-spacing: 0.15em;
  margin-top: 8px;
}

/* ─── HERO NEWS BAR ─── */
.hero-news-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 3;
  background: rgba(255,255,255,0.10);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-top: 1px solid rgba(255,255,255,0.15);
}
.hero-news-bar-inner {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  gap: 0;
  height: 52px;
}
.hero-news-ticker {
  display: flex;
  align-items: center;
  flex: 1;
  min-width: 0;
  opacity: 1;
  transition: opacity 0.4s ease;
}
.hero-news-label {
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.35em;
  color: #0d1528;
  background: var(--accent);
  padding: 5px 14px;
  flex-shrink: 0;
  height: 100%;
  display: flex;
  align-items: center;
  margin-right: 24px;
}
.hero-news-date {
  font-size: 12px;
  color: rgba(255,255,255,0.50);
  letter-spacing: 0.05em;
  flex-shrink: 0;
  margin-right: 20px;
}
.hero-news-text {
  font-size: 14px;
  color: rgba(255,255,255,0.88);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  flex: 1;
  text-decoration: none;
  letter-spacing: 0.02em;
  transition: color 0.2s;
}
.hero-news-text:hover { color: var(--accent); }
.hero-news-more {
  flex-shrink: 0;
  margin-left: 20px;
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.25em;
  color: var(--accent);
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: gap 0.2s;
}
.hero-news-more:hover { gap: 10px; }
.hero-news-more::after {
  content: '→';
  font-size: 12px;
}
@media (max-width: 768px) {
  .hero-news-date { display: none; }
  .hero-news-more { display: none; }
  .hero-news-bar-inner { gap: 0; }
  .hero-video-content { padding-left: 24px; padding-right: 24px; }
  .hero-video-title { font-size: clamp(36px, 9vw, 44px); }
}

/* ─── YOUTUBE SECTION ─── */
.youtube-section {
  background: #0d1528;
  padding: 80px 24px;
}
.youtube-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 420px 1fr;
  gap: 64px;
  align-items: center;
}
.youtube-label {
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.5em;
  color: var(--accent);
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 20px;
}
.youtube-label::before {
  content: '';
  display: block;
  width: 28px;
  height: 1px;
  background: var(--accent);
}
.youtube-title {
  font-family: var(--display);
  font-size: clamp(48px, 7vw, 80px);
  color: var(--white);
  line-height: 1;
  letter-spacing: 0.04em;
  margin-bottom: 20px;
}
.youtube-desc {
  font-size: 14px;
  color: rgba(255,255,255,0.60);
  line-height: 1.9;
  margin-bottom: 32px;
  max-width: 360px;
}
.youtube-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #ff0000;
  color: #fff;
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.2em;
  padding: 13px 28px;
  text-decoration: none;
  transition: background 0.3s, transform 0.3s;
}
.youtube-btn:hover {
  background: #cc0000;
  transform: translateX(4px);
}
.youtube-btn::before {
  content: '▶';
  font-size: 12px;
}
.youtube-embed {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 9;
  display: block;
  text-decoration: none;
  overflow: hidden;
}
.youtube-embed img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}
.youtube-embed:hover img {
  transform: scale(1.04);
}
.youtube-play {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0,0,0,0.25);
  transition: background 0.3s;
}
.youtube-embed:hover .youtube-play {
  background: rgba(0,0,0,0.45);
}
.youtube-play-icon {
  width: 72px;
  height: 72px;
  background: #ff0000;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.3s, background 0.3s;
}
.youtube-embed:hover .youtube-play-icon {
  transform: scale(1.12);
  background: #cc0000;
}
.youtube-play-icon::after {
  content: '';
  display: block;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 12px 0 12px 22px;
  border-color: transparent transparent transparent #fff;
  margin-left: 5px;
}
.youtube-video-title {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 12px 16px;
  background: linear-gradient(transparent, rgba(0,0,0,0.75));
  color: #fff;
  font-size: 13px;
  font-family: var(--sans);
  letter-spacing: 0.03em;
  line-height: 1.5;
}
.youtube-embed iframe {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  border: none;
}
@media (max-width: 768px) {
  .youtube-inner { grid-template-columns: 1fr; gap: 32px; }
  .youtube-title { font-size: 56px; }
}

/* ─── FOLLOW US (X TIMELINE) SECTION ─── */
.followus-section {
  background: var(--gray-100);
  padding: 80px 24px;
}
.followus-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 420px;
  gap: 64px;
  align-items: start;
}
.followus-label {
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.5em;
  color: var(--accent);
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 20px;
}
.followus-label::before {
  content: '';
  display: block;
  width: 28px;
  height: 1px;
  background: var(--accent);
}
.followus-title {
  font-family: var(--display);
  font-size: clamp(48px, 7vw, 80px);
  color: var(--navy);
  line-height: 1;
  letter-spacing: 0.04em;
  margin-bottom: 20px;
}
.followus-desc {
  font-size: 14px;
  color: var(--gray-700);
  line-height: 1.9;
  margin-bottom: 32px;
  max-width: 360px;
}
.followus-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #000;
  color: #fff;
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.2em;
  padding: 13px 28px;
  text-decoration: none;
  transition: background 0.3s, transform 0.3s;
}
.followus-btn:hover {
  background: #1a1a1a;
  transform: translateX(4px);
}
.followus-btn::before {
  content: '𝕏';
  font-size: 15px;
  font-family: serif;
}
.followus-timeline {
  width: 100%;
}
/* ─── PRESIDENT PAGE WITH X SIDEBAR ─── */
.president-with-x {
  display: grid;
  grid-template-columns: 1fr 340px;
  gap: 48px;
  align-items: start;
}
.president-x-label {
  font-family: var(--display);
  font-size: 11px;
  letter-spacing: 0.4em;
  color: var(--gray-500);
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.president-x-label::before {
  content: '';
  display: block;
  width: 20px;
  height: 1px;
  background: var(--gray-500);
}
@media (max-width: 768px) {
  .followus-inner { grid-template-columns: 1fr; gap: 32px; }
  .followus-title { font-size: 56px; }
  .president-with-x { grid-template-columns: 1fr; }
}

/* ─── HERO CTA BUTTONS ─── */
.hero-cta {
  display: flex;
  gap: 20px;
  align-items: center;
  flex-wrap: wrap;
}
.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  background: var(--accent);
  color: #0a0f1e;
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.25em;
  padding: 15px 36px;
  text-decoration: none;
  transition: background 0.3s, transform 0.3s;
}
.btn-primary:hover {
  background: var(--accent-light);
  transform: translateX(5px);
}
.btn-ghost {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: rgba(255,255,255,0.70);
  font-family: var(--display);
  font-size: 13px;
  letter-spacing: 0.25em;
  text-decoration: none;
  padding-bottom: 3px;
  border-bottom: 1px solid rgba(255,255,255,0.30);
  transition: color 0.3s, border-color 0.3s, gap 0.3s;
}
.btn-ghost::after { content: '→'; }
.btn-ghost:hover {
  color: var(--white);
  border-color: var(--white);
  gap: 12px;
}

/* ─── HERO BG DECORATION TEXT ─── */
.hero-bg-text {
  position: absolute;
  bottom: 52px;
  right: -10px;
  font-family: var(--display);
  font-size: clamp(100px, 18vw, 220px);
  line-height: 1;
  color: rgba(255,255,255,0.04);
  letter-spacing: -0.02em;
  pointer-events: none;
  user-select: none;
  z-index: 1;
}

/* ─── STATEMENT SECTION ─── */
.statement-section {
  background: var(--white);
  padding: 96px 24px;
}
.statement-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
.statement-label {
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.5em;
  color: var(--accent);
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 28px;
}
.statement-label::before {
  content: '';
  display: block;
  width: 36px;
  height: 1px;
  background: var(--accent);
}
.statement-title {
  font-family: var(--serif);
  font-size: clamp(28px, 4vw, 48px);
  font-weight: 700;
  color: var(--navy);
  line-height: 1.45;
}
.statement-body {
  font-size: 15px;
  color: var(--gray-700);
  line-height: 2.1;
}
.statement-rule {
  width: 100%;
  height: 1px;
  background: var(--gray-200);
  margin-bottom: 28px;
}
.statement-values {
  display: flex;
  gap: 32px;
}
.statement-value-item {
  display: flex;
  flex-direction: column;
  gap: 4px;
}
.statement-value-num {
  font-family: var(--display);
  font-size: 36px;
  color: var(--navy);
  letter-spacing: -0.02em;
  line-height: 1;
}
.statement-value-num span { font-size: 0.55em; }
.statement-value-label {
  font-size: 11px;
  color: var(--gray-500);
  letter-spacing: 0.1em;
}
@media (max-width: 768px) {
  .statement-inner { grid-template-columns: 1fr; gap: 32px; }
  .statement-values { gap: 20px; }
  .hero-bg-text { display: none; }
}

/* ─── MARQUEE TICKER ─── */
.marquee-wrap {
  background: #0a0f1e;
  overflow: hidden;
  border-top: 1px solid rgba(200,169,90,0.3);
  border-bottom: 1px solid rgba(200,169,90,0.3);
}
.marquee-track {
  display: flex;
  white-space: nowrap;
  animation: marqueeTick 30s linear infinite;
  width: max-content;
}
.marquee-track span {
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.5em;
  color: var(--accent);
  padding: 13px 36px;
  display: inline-block;
  border-right: 1px solid rgba(200,169,90,0.2);
}
@keyframes marqueeTick {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

/* ─── FEATURES HEADER ─── */
.features-header {
  grid-column: 1 / -1;
  padding-bottom: 16px;
  margin-bottom: 32px;
  border-bottom: 2px solid rgba(200,169,90,0.25);
  position: relative;
  overflow: hidden;
}
.features-header .section-bg-text {
  color: rgba(255,255,255,0.025);
}
.features-header .section-title-en {
  color: var(--accent);
  font-size: clamp(32px, 4.5vw, 60px);
  white-space: nowrap;
}
.features-header .section-title-ja {
  color: rgba(255,255,255,0.5);
}
.features-header .section-title-ja::before {
  background: rgba(200,169,90,0.5);
}

/* ─── FEATURE CARD NUMBER ─── */
.feature-num {
  font-family: var(--display);
  font-size: 80px;
  line-height: 0.85;
  color: rgba(200,169,90,0.25);
  letter-spacing: -0.02em;
  margin-bottom: -8px;
  display: block;
}

/* ─── NEWS FILTER ─── */
.news-filter {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}
.news-filter-btn {
  padding: 8px 24px;
  border: 1px solid var(--gray-200);
  background: var(--white);
  color: var(--gray-700);
  font-family: var(--display);
  font-size: 12px;
  letter-spacing: 0.15em;
  cursor: pointer;
  transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.news-filter-btn:hover,
.news-filter-btn.active {
  background: var(--navy);
  color: var(--white);
  border-color: var(--navy);
}

/* ─── NEWS CARD GRID ─── */
.news-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}
.news-card {
  background: var(--white);
  text-decoration: none;
  color: var(--text);
  border: 1px solid var(--gray-200);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform 0.35s ease, box-shadow 0.35s ease;
}
.news-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 48px rgba(0,0,0,0.10);
}
.news-card-img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.65s ease;
  display: block;
}
.news-card:hover .news-card-img { transform: scale(1.05); }
.news-card-body {
  padding: 24px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.news-card .news-title {
  font-size: 16px;
  line-height: 1.55;
  margin-top: 4px;
}
.news-card .news-excerpt {
  margin-top: 10px;
  font-size: 13px;
  color: var(--gray-500);
  line-height: 1.7;
}

/* ─── CUSTOM CURSOR (Tom & Jerry) ─── */
/* 猫トム（追跡者）*/
.cursor-ring {
  position: fixed;
  width: 32px; height: 32px;
  background: url('cat-cursor.svg') no-repeat center/contain;
  pointer-events: none;
  z-index: 99999;
  top: -100px; left: -100px;
  transform-origin: center;
  transition: transform 0.2s ease;
}
.cursor-ring-text { display: none; }
.cursor-dot { display: none; }
/* トムが追いついたとき：トム大きく、ジェリーやられ顔 */
body.cat-caught {
  cursor: url('mouse-defeated.svg') 16 21, auto;
}
body.cat-caught .cursor-ring { transform: scale(1.4); }
/* 蹴っ飛ばし時：ネズミが蹴り顔に */
body.cat-kick {
  cursor: url('mouse-punch-xl.svg') 26 36, auto;
}
/* ネコが蹴り飛ばされるアニメーション */
@keyframes catFlyOff {
  0%   { transform: scale(1.4); opacity: 1; }
  25%  { transform: scale(2.2) rotate(-25deg); opacity: 1; }
  60%  { transform: scale(1.2) rotate(-180deg); opacity: 0.6; }
  100% { transform: scale(0.4) rotate(-600deg) translateX(-280vw) translateY(-200vh); opacity: 0; }
}
.cursor-ring.cat-kicked {
  animation: catFlyOff 0.65s cubic-bezier(0.4, 0, 1, 1) forwards !important;
  transition: none !important;
}
@media (hover: none) { .cursor-ring { display: none; } }

/* ─── PAGE LOADER ─── */
#page-loader {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  width: 100%; height: 100%;
  z-index: 99998;
  background: #1a2744;
  background: var(--navy);
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
  flex-direction: column;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
  gap: 28px;
  opacity: 1;
  transition: opacity 0.8s ease;
}
#page-loader.fade-out {
  opacity: 0;
  pointer-events: none;
}
.loader-logo {
  width: 150px;
  height: 150px;
  object-fit: contain;
  animation: loaderIn 0.9s cubic-bezier(0.16,1,0.3,1) 0.15s both;
}
.loader-name {
  font-family: var(--display);
  font-size: 20px;
  letter-spacing: 0.35em;
  color: rgba(255,255,255,0.75);
  animation: loaderIn 0.9s cubic-bezier(0.16,1,0.3,1) 0.35s both;
}
.loader-bar-wrap {
  width: 180px;
  height: 2px;
  background: rgba(255,255,255,0.12);
  border-radius: 2px;
  overflow: hidden;
}
.loader-bar {
  height: 100%;
  width: 0;
  background: var(--accent);
  border-radius: 2px;
  animation: loaderBarGrow 1.8s cubic-bezier(0.4,0,0.2,1) 0s forwards;
}
@keyframes loaderIn {
  from { opacity: 0; transform: translateY(18px); }
  to   { opacity: 1; transform: none; }
}
@keyframes loaderBarGrow {
  0%   { width: 0%; }
  65%  { width: 80%; }
  100% { width: 100%; }
}

/* ─── SCROLL ANIMATIONS ─── */
.anim {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);
}
.anim.in { opacity: 1; transform: none; }
.anim-d1 { transition-delay: 0.10s; }
.anim-d2 { transition-delay: 0.22s; }
.anim-d3 { transition-delay: 0.34s; }
.anim-d4 { transition-delay: 0.46s; }

/* ─── PAGE TRANSITION ─── */
body.inner-page .page.active .page-hero {
  animation: pageFadeUp 0.7s cubic-bezier(0.16,1,0.3,1) both;
}
body.inner-page .page.active .content-area {
  animation: pageFadeUp 0.8s cubic-bezier(0.16,1,0.3,1) 0.15s both;
}
@keyframes pageFadeUp {
  from { opacity: 0; transform: translateY(28px); }
  to   { opacity: 1; transform: none; }
}

/* ─── FEATURE CARD IMAGE HOVER ZOOM ─── */
.feature-card { overflow: hidden; }
.feature-card img { transition: transform 0.65s ease; }
.feature-card:hover img { transform: scale(1.06); }

/* ─── SECTION DECO TEXT ─── */
.section-deco-wrap { position: relative; }
.section-bg-text {
  position: absolute;
  top: 50%;
  left: -4px;
  transform: translateY(-58%);
  font-family: var(--display);
  font-size: clamp(72px, 12vw, 150px);
  line-height: 1;
  color: rgba(26,39,68,0.05);
  letter-spacing: 0.10em;
  white-space: nowrap;
  pointer-events: none;
  user-select: none;
  z-index: 0;
}
.section-deco-wrap > * { position: relative; z-index: 1; }

/* ─── RESPONSIVE ─── */
@media (max-width: 768px) {
  header nav { display: none; }
  .hamburger { display: flex; }
  .mobile-nav {
    background: var(--navy);
    padding: 16px 0;
  }
  .mobile-nav.open { display: block; }
  .mobile-nav a {
    display: block;
    padding: 12px 24px;
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    font-size: 14px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .mobile-nav .mobile-sub a { padding-left: 40px; font-size: 13px; }
  .hero { height: 320px; }
  .president-block { grid-template-columns: 1fr; }
  .president-img { max-width: 220px; }
  .footer-grid { grid-template-columns: 1fr; gap: 32px; }
  .news-item { grid-template-columns: 1fr; }
  .news-img { height: 180px; }
  .timeline { padding-left: 80px; }
  .timeline-year { left: -80px; width: 60px; font-size: 11px; }
  .timeline::before { left: 56px; }
  .timeline-item::before { left: -28px; }
  .data-table th { width: 120px; }
  .logo-img { height: 44px; }
  .logo-main { font-size: 16px; }
  .logo-sub { display: none; }
  .news-grid { grid-template-columns: 1fr; }
  .news-card-img { height: 180px; }
  .features-header .section-title-en { font-size: 28px; white-space: nowrap; }
  .feature-num { font-size: 56px; }
  /* iOS parallax fix */
  .parallax-section {
    background-attachment: scroll;
    height: auto;
    min-height: 260px;
  }
  .parallax-content { padding: 56px 20px; }
  .parallax-nums { gap: 16px; flex-direction: column; align-items: center; }
  .officers-table td { padding: 14px 10px; font-size: 14px; }
  .officers-table td:first-child { width: 140px; }
  .access-block { grid-template-columns: 1fr; grid-template-rows: auto; }
  .access-photo  { grid-row: auto; aspect-ratio: 4 / 3; }
  .access-card   { grid-column: 1; grid-row: auto; }
  .map-container { grid-column: 1; grid-row: auto; min-height: 250px; }
}

/* ─── CONTACT FORM ─── */
.contact-intro { margin-bottom: 48px; line-height: 2; color: var(--gray-700); }
.contact-tel-block { display: flex; gap: 32px; margin-top: 24px; flex-wrap: wrap; }
.contact-tel-item { display: flex; flex-direction: column; gap: 4px; }
.contact-tel-label { font-size: 12px; letter-spacing: 0.08em; color: var(--gray-500); }
.contact-tel-num { font-family: var(--display); font-size: 28px; color: var(--navy); text-decoration: none; letter-spacing: 0.06em; }
.contact-tel-num:hover { color: var(--accent); }
.contact-form { max-width: 680px; }
.form-group { margin-bottom: 28px; }
.form-label { display: block; font-size: 13px; font-weight: 700; letter-spacing: 0.06em; color: var(--navy); margin-bottom: 8px; }
.form-required { display: inline-block; background: var(--navy); color: #fff; font-size: 10px; padding: 2px 6px; border-radius: 2px; margin-left: 6px; vertical-align: middle; }
.form-input, .form-select, .form-textarea {
  width: 100%; padding: 12px 16px; border: 1px solid var(--gray-200);
  border-radius: 3px; font-family: var(--sans); font-size: 15px;
  color: var(--text); background: #fff;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
  outline: none; border-color: var(--navy);
  box-shadow: 0 0 0 3px rgba(26,39,68,0.08);
}
.form-textarea { resize: vertical; min-height: 140px; }
.form-submit { margin-top: 40px; }
.contact-thanks { background: var(--gray-100); border-left: 4px solid var(--accent); padding: 24px 28px; margin-bottom: 40px; line-height: 2; }
.contact-error { background: #fff0f0; border-left: 4px solid #c04040; padding: 24px 28px; margin-bottom: 40px; }
</style>
</head>
