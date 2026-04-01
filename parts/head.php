<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<script>window._pageStart=Date.now();</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$_ogTitle = isset($pageTitle) ? htmlspecialchars($pageTitle).' | 成田機材株式会社' : '成田機材株式会社 – Piping & Housing';
$_ogDesc  = isset($pageDesc)  ? htmlspecialchars($pageDesc)  : '千葉県富里市・茂原市に拠点を置く配管機材・住宅資材の専門商社。豊富な在庫と迅速な配送で地域の工事業者様を支えています。';
$_ogImg   = isset($pageOgImg) ? $pageOgImg : 'https://narita-kizai.com/assets/img/logo/narita_logo_512x512_2.png';
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
<link rel="icon" href="/assets/img/logo/favicon.ico" sizes="any">
<link rel="icon" href="/assets/img/logo/favicon-32.png" type="image/png" sizes="32x32">
<link rel="icon" href="/assets/img/logo/favicon-16.png" type="image/png" sizes="16x16">
<link rel="apple-touch-icon" href="/assets/img/logo/favicon-180.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;600;700&family=Noto+Sans+JP:wght@400;500;700&family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css">

</head>
