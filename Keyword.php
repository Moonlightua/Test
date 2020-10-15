<?php
$kword = htmlspecialchars($_POST['keyword']);
$text = htmlspecialchars($_POST['text']);


if($_SERVER['REQUEST_METHOD']=="post" and !empty($_POST['keyword']) and !empty($_POST['text']))
    $pat = "/$kword.?/";
    preg_match_all("/$kword.?/", $text, $arr);

?>

<form action="" method="post">
    <div>Keyword:<br>
        <input type="text" name="keyword"></div>
    Text: <br>
    <textarea type="text" name="text" cols="50" rows="5"></textarea><br>
    <div><input type="submit" name="button" value="Go"></div>
    Answer:
</form>

<?php
$count = count($arr[0]);
$ctend = $count-1;
if($count == 1) {
    @$start = strstr($text, $arr[0][0], true);
    $num = (strlen($start) + strlen($arr[0][0]));
    $finish = substr($text, $num);
    echo $start . "<b>" . $arr[0][0] . "</b>" . $finish . "<br>";
}else {
    $array=(str_word_count($text, 1,'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя,.—-:;\"«»()'));
    foreach($array as $word){
        if($word == $kword or $word ==$kword."." or $word ==$kword."," ){
            $word = "<b>".$word."</b>";
        }
        echo $word." ";
    }

}