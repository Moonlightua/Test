<?php
$link = mysqli_connect('localhost','root','4321','city','33061');

function clearStr($data){
    global $link;
    $data=trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

/*

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['city'])) {
    $city = $_POST['city'];
    $sql = "INSERT INTO city.cities(name) VALUE ('$city')";
    mysqli_query($link, $sql);
}
*/

if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['city'])) {
    $city = $_POST['city'];
    $count = strlen($city);
    $num = $count - 1;
    for ($i = $num; $i < $count; ++$i) {
      $y = $city[$i];
    }
}
?>

<form method="post" action="">
Город: <input type="text" name="city" /><br />
<br />

<input type="submit" value="Отправить!" />

</form>





<?php
if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['city'])) {
    $sql = "SELECT name FROM cities WHERE name like '$y%'";
    $res = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<msg
    {$row['name']}
msg;
    }
}

/*
$sql = "SELECT id,name FROM city.cities ORDER BY id DESC";
$res = mysqli_query($link,$sql);
echo "<p> Всего записей в книге: " .mysqli_num_rows($res);
while($row = mysqli_fetch_assoc($res)){
    echo <<<msg
    <p>
    {$row['id']}.{$row['name']}

</p>
msg;

}
*/

/*
$array = array( 'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'), 'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'), 'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'), 'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Стас'), 'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'), 'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'), 'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'), 'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'), 'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Даша'), );

echo'<pre>';
print_r($array);


foreach($array as $k=>$v){
    if(is_array($v))
        $arrk[] = $v['age'].'('.$v['gender'].')'.' - '.$v['login'];


}

asort($arrk);
echo'<pre>';
print_r($arrk);
*/