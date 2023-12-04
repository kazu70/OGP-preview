<?php
// 指定されたページのURL
$url = "https://kazusannn.cloudfree.jp/tool/date/";  // お好きなURLに変更してください

// HTMLファイルの内容を取得
$htmlContent = file_get_contents($url);

// HTMLからOGP情報を正規表現を使って抽出
preg_match_all('/<meta property="og:(.*?)" content="(.*?)">/', $htmlContent, $matches);

// OGP情報を連想配列に格納
$ogp = array_combine($matches[1], $matches[2]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OGP Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .preview {
            max-width: 600px;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="preview">
        <h1><?php echo $ogp['title']; ?></h1>
        <p><?php echo $ogp['description']; ?></p>
        <img src="<?php echo $ogp['image']; ?>" alt="OGP Image">
        <a href="<?php echo $ogp['url']; ?>" target="_blank">Visit the page</a>
    </div>
</body>
</html>