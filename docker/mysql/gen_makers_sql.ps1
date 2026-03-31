$srcEnc = [System.Text.Encoding]::GetEncoding(932)
$csv    = 'C:\Users\TKW06\Desktop\maker_upload_250801.csv'
$out    = 'C:\Users\TKW06\Docker\narita\docker\mysql\init\02_makers_data.sql'

$text  = [System.IO.File]::ReadAllText($csv, $srcEnc)
$lines = $text -split "`r`n|`n"

$inserts = @()
$order   = 0
foreach ($line in $lines) {
    $cols = $line -split ',', 6
    if ($cols.Count -lt 3) { continue }
    $rowGroup  = $cols[0].Trim()
    $kanaGroup = $cols[1].Trim()
    $name      = $cols[2].Trim()
    $url       = if ($cols.Count -ge 4) { $cols[3].Trim() } else { '' }
    if ($rowGroup -eq '' -or $name -eq '') { continue }
    $order++
    $esc = { param($s) $s -replace "'","''" }
    $rg  = & $esc $rowGroup
    $kg  = & $esc $kanaGroup
    $nm  = & $esc $name
    $ur  = & $esc $url
    $urVal = if ($ur -eq '') { 'NULL' } else { "'$ur'" }
    $inserts += "($order,'$rg','$kg','$nm',$urVal,$order)"
}

$header = @"
-- makers data (auto-generated from CSV)
INSERT INTO makers (id, row_group, kana_group, name, url, sort_order) VALUES
"@

$body = $inserts -join ",`n"
$sql  = $header + "`n" + $body + ";"

$utf8NoBom = New-Object System.Text.UTF8Encoding $false
[System.IO.File]::WriteAllText($out, $sql, $utf8NoBom)
Write-Host ("Generated: " + $inserts.Count + " makers -> " + $out)
