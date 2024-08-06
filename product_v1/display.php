<?php

$id = $_GET['id'] ?? 'x';


if($id==1) {
    $name = '蘋果';
    $intro = '蘋果是一種廣受歡迎的水果，屬於薔薇科。原產於中亞，蘋果的果實通常圓形，顏色多為紅、綠或黃，口感脆嫩多汁。蘋果富含維他命C、纖維素和抗氧化劑，有助於促進消化和增強免疫系統。除了直接食用外，蘋果也常被用於製作果汁、果醬及甜點。它的營養價值和多樣用途使其成為健康飲食的理想選擇。';
    $pic = 'apple.png';
}
elseif($id==2) {
    $name = '香蕉';
    $intro = '香蕉是一種熱帶水果，原產於東南亞，現已在全球廣泛種植。其果實長形、弧形，表皮光滑，顏色從綠色變為黃色或紅色。香蕉富含鉀、維他命B6和纖維素，有助於維持心臟健康、促進消化。香蕉味道甜美，可直接食用，也常用於製作奶昔、甜點和麵包。其便捷的食用方式和營養價值使它成為受歡迎的健康食品。';
    $pic = 'banana.png';
}
elseif($id==3) {
    $name = '鳳梨';
    $intro = '鳳梨是一種熱帶水果，原產於南美洲。其外形獨特，表面有堅硬的棘刺，果肉金黃多汁，味道甜中帶酸。鳳梨富含維他命C、鉀和纖維，有助於增強免疫系統和促進消化。除了直接食用，鳳梨還可用於製作果汁、甜點及調味品。它的清爽風味和營養價值使其在全球各地都受到喜愛。';
    $pic = 'pineapple.png';
}
else {
    $name = '資料未知';
    $intro = '有錯誤';
    $pic = 'xxxx.png';
}



$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>[<a href="list.php">回清單頁</a>]</p>
    <h1>{$name}</h1>
    <p>{$intro}</p>
    <p><img src="images/{$pic}"></p>
    <hr>
    <p>id: {$id}</p>
</body>
</html>
HEREDOC;

echo $html;
?>