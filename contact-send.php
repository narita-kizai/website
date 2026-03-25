<?php
// 送信先メールアドレス（テスト用）
define('MAIL_TO', 'nakajima@narita-kizai.com');
define('MAIL_FROM', 'noreply@narita-kizai.com');

// POSTメソッド以外はリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

// 入力値取得・サニタイズ
$name     = trim(strip_tags($_POST['name']     ?? ''));
$company  = trim(strip_tags($_POST['company']  ?? ''));
$email    = trim(strip_tags($_POST['email']    ?? ''));
$tel      = trim(strip_tags($_POST['tel']      ?? ''));
$category = trim(strip_tags($_POST['category'] ?? ''));
$message  = trim(strip_tags($_POST['message']  ?? ''));

// バリデーション
if ($name === '' || $email === '' || $category === '' || $message === '') {
    header('Location: /contact.php?error=1');
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /contact.php?error=1');
    exit;
}

// メール本文
$body  = "成田機材株式会社 お問い合わせフォームより\n";
$body .= str_repeat('─', 40) . "\n";
$body .= "お名前　　　：{$name}\n";
$body .= "会社名　　　：{$company}\n";
$body .= "メール　　　：{$email}\n";
$body .= "電話番号　　：{$tel}\n";
$body .= "種別　　　　：{$category}\n";
$body .= str_repeat('─', 40) . "\n";
$body .= "お問い合わせ内容：\n{$message}\n";
$body .= str_repeat('─', 40) . "\n";

// メールヘッダー
$subject = "[成田機材] お問い合わせ：{$category}（{$name}様）";
$headers  = "From: " . MAIL_FROM . "\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// 文字化け防止
$subject  = mb_encode_mimeheader($subject, 'UTF-8', 'B');
$body     = mb_convert_encoding($body, 'UTF-8');

// 送信
$result = mail(MAIL_TO, $subject, $body, $headers);

if ($result) {
    // 自動返信メール
    $reply_body  = "{$name} 様\n\n";
    $reply_body .= "お問い合わせありがとうございます。\n";
    $reply_body .= "成田機材株式会社です。内容を確認の上、担当者よりご連絡いたします。\n\n";
    $reply_body .= "─────────────────────\n";
    $reply_body .= "成田機材株式会社\n";
    $reply_body .= "本店・富里営業部：0476-93-0635\n";
    $reply_body .= "茂原営業所：0475-25-0812\n";
    $reply_body .= "https://narita-kizai.com\n";
    $reply_body .= "─────────────────────\n";

    $reply_subject = mb_encode_mimeheader("【成田機材株式会社】お問い合わせを受け付けました", 'UTF-8', 'B');
    $reply_headers  = "From: " . MAIL_FROM . "\r\n";
    $reply_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($email, $reply_subject, $reply_body, $reply_headers);

    header('Location: /contact.php?sent=1');
} else {
    header('Location: /contact.php?error=1');
}
exit;
