<?php
// 產生年的選項
$str_yy = '';
$begin_year = 1951;
$end_year = date('Y', time());
for($i=$end_year; $i>=$begin_year; $i--) {
	$str_yy .= '<option>' . $i . '</option>';
	$str_yy .= "\n";
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Survey</title>
</head>

<body>
<h1>問卷調查</h1>
<p>請輸入你的個人基本資料</p>

<form method="post" action="show.php">

  <div style="background-color:#FFFFAA; padding:10px;">
	
  <p>生日2：<input type="date" name="birthday"></p>
  <p>幸運色：<input type="color" name="color"></p>
  <p>身高：<input type="range" name="height"></p>

  </div>

  <p>姓名：<input type="text" name="nickname"></p>

  <p>密碼：<input type="password" name="password"></p>

  <p>性別：
  	<input type="radio" name="gender" value="M">男
    <input type="radio" name="gender" value="F">女
	<input type="radio" name="gender" value="X">其他
  </p>

  <p>血型：
  	<input type="radio" name="blood" value="A">A
  	<input type="radio" name="blood" value="B">B
  	<input type="radio" name="blood" value="O">O
  	<input type="radio" name="blood" value="AB">AB
  	<input type="radio" name="blood" value="X" checked="checked">未知
  </p>

  <p>生日：
  	<select name="birth_yy">
		{$str_yy}
  	</select>
  	年 
  	<select name="birth_mm">
  		<option value="1">一</option>
  		<option value="2">二</option>
  		<option value="3">三</option>
  		<option>4</option>
  		<option>5</option>
  		<option>6</option>
  		<option>7</option>
  		<option>8</option>
  		<option>9</option>
  		<option>10</option>
  		<option>11</option>
  		<option>12</option>
  	</select>
  	月
  	<select name="birth_dd">
  		<option>1</option>
  		<option>2</option>
  		<option>3</option>
  		<option>4</option>
  		<option>5</option>
  		<option>6</option>
  		<option>7</option>
  		<option>8</option>
  		<option>9</option>
  		<option>10</option>
  		<option>11</option>
  		<option>12</option>
  		<option>13</option>
  		<option>14</option>
  		<option>15</option>
  		<option>16</option>
  		<option>17</option>
  		<option>18</option>
  		<option>19</option>
  		<option>20</option>
  		<option>21</option>
  		<option>22</option>
  		<option>23</option>
  		<option>24</option>
  		<option>25</option>
  		<option>26</option>
  		<option>27</option>
  		<option>28</option>
  		<option>29</option>
  		<option>30</option>
  		<option>31</option>
  	</select>
  	日
  </p>

  <p>是否已婚：<input type="checkbox" name="marriage" value="Y">(已婚請勾選)</p>

  <p>休閒興趣：
	  <input type="checkbox" name="hobby1" value="Y">音樂 
	  <input type="checkbox" name="hobby2" value="Y">閱讀 
	  <input type="checkbox" name="hobby3" value="Y">旅遊 
	  <input type="checkbox" name="hobby4" value="Y">美食
  </p>

  <p>個人簡介：
  	<textarea name="intro" rows="6" cols="40"></textarea>
  </p>

  <p><input type="submit" value="送出"></p>

</form>

</body>
</html>
HEREDOC;

echo $html;
?>