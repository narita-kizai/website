<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>あいにくだが――成田機材株式会社</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body {
  background: #0a0f1e;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', sans-serif;
  overflow: hidden;
}
.wrap {
  display: grid;
  grid-template-columns: 1fr 1fr;
  max-width: 1000px;
  width: 100%;
  padding: 40px 24px;
  gap: 64px;
  align-items: center;
}
.img-side {
  position: relative;
}
.img-side img {
  width: 100%;
  max-width: 400px;
  display: block;
  border: 3px solid rgba(200,169,90,0.4);
  box-shadow: 12px 12px 0 rgba(200,169,90,0.15), 0 0 60px rgba(0,0,0,0.8);
  filter: grayscale(20%);
}
.img-side::before {
  content: 'PRIVATE';
  position: absolute;
  top: -12px;
  left: -12px;
  font-size: 10px;
  letter-spacing: 0.4em;
  color: #c8a95a;
  border: 1px solid #c8a95a;
  padding: 4px 10px;
  background: #0a0f1e;
}
.msg-side {
  color: #fff;
}
.label {
  font-size: 11px;
  letter-spacing: 0.5em;
  color: #c8a95a;
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.label::before {
  content: '';
  display: block;
  width: 32px;
  height: 1px;
  background: #c8a95a;
}
.main-text {
  font-size: clamp(24px, 4vw, 40px);
  font-weight: 900;
  line-height: 1.4;
  margin-bottom: 32px;
  letter-spacing: 0.05em;
}
.main-text em {
  font-style: normal;
  color: #c8a95a;
}
.sub-text {
  font-size: 14px;
  color: rgba(255,255,255,0.5);
  line-height: 2;
  margin-bottom: 48px;
  border-left: 2px solid rgba(200,169,90,0.3);
  padding-left: 16px;
}
.back-btn {
  display: inline-block;
  padding: 14px 40px;
  border: 1px solid #c8a95a;
  color: #c8a95a;
  text-decoration: none;
  font-size: 12px;
  letter-spacing: 0.3em;
  transition: background 0.2s, color 0.2s;
}
.back-btn:hover {
  background: #c8a95a;
  color: #0a0f1e;
}
.noise {
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
  pointer-events: none;
  opacity: 0.4;
}
@media (max-width: 640px) {
  .wrap { grid-template-columns: 1fr; gap: 40px; text-align: center; }
  .img-side img { max-width: 260px; margin: 0 auto; }
  .label { justify-content: center; }
  .sub-text { text-align: left; }
}
</style>
</head>
<body>
<div class="noise"></div>
<div class="wrap">
  <div class="img-side">
    <img src="/wp.jpg" alt="">
  </div>
  <div class="msg-side">
    <div class="label">403 FORBIDDEN</div>
    <p class="main-text">
      生憎だが、<br>
      ウチは<em>WordPress</em>は<br>
      使ってねぇンだよ。
    </p>
    <p class="sub-text">
      お探しの管理画面はここにはありません。<br>
      成田機材のサイトは独自開発です。<br>
      心当たりのある方、ご遠慮ください。
    </p>
    <a href="/" class="back-btn">← サイトトップへ</a>
  </div>
</div>
</body>
</html>
