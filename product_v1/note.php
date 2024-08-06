<?php

// 預備知識：一維陣列
$fruits = array(1=>"Apple", 2=>"Banana", 3=>"Pineapple");
$name = $fruits[1];
echo '<h2>簡單測試</h2>';
echo $name;

// 預備知識：單一項目的陣列 (關聯陣列，即key=>value)
$apple = array(
    'name' =>'蘋果',
    'descr'=>'蘋果是一種廣受歡迎的水果',
    'pic'  =>'apple.png'
);

// 多維陣列，完整的表示資料
$a_fruits = array(
    1=>array(
        'name'=>'蘋果',
        'descr'=>'蘋果是一種廣受歡迎的水果',
        'pic'=>'apple.png'
    ), 
    2=>array(
        'name'=>'香蕉',
        'descr'=>'香蕉是一種熱帶水果。',
        'pic'=>'banana.png'
    ), 
    3=>array(
        'name'=>'鳳梨',
        'descr'=>'鳳梨是一種熱帶水果，原產於南美洲',
        'pic'=>'pineapple.png'
    )
);

// 用陣列迴圈列出所有項目
echo '<h2>用陣列迴圈列出所有項目</h2>';
foreach($a_fruits as $key=>$a_one) {
    echo 'key:' . $key;
    echo '<br>';
    echo 'a_one[name]:' . $a_one['name'] . '<br>';
    echo 'a_one[descr]:' . $a_one['descr'] . '<br>';
    echo 'a_one[pic]:' . $a_one['pic'] . '<br>';
    echo '<br>';
}

// 取出指定的項目 (id=2)
$id = 1;
$name  = $a_fruits[$id]['name'];
$descr = $a_fruits[$id]['descr'];
$pic   = $a_fruits[$id]['pic'];

echo '<h2>單一項目</h2>';
echo $id . '<br>';
echo $name . '<br>';
echo $descr . '<br>';
echo $pic . '<br>';

?>