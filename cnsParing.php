<?php
//Написать консольный парсер, который принимает на вход урл, валидирует его
//И получает по заданному урлу ссылки на все картинки. Эти ссылки сохранить в цсв файл.

include_once ('curl.php');
$Url = $argv[1];
$data = curl_get($Url);
$file = 'pars2.csv';
$images = array();

preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
unset($data);
$data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);

foreach ($data as $url) {
    $info = pathinfo($url);
    if (isset($info['extension'])) {
        if (($info['extension'] == 'jpg') ||
            ($info['extension'] == 'jpeg') ||
            ($info['extension'] == 'gif') ||
            ($info['extension'] == 'png'))
            array_push($images, $url);
    }
}
foreach ($images as $value) {
    //echo $value,'<br>';
    file_put_contents($file, $value."\n", FILE_APPEND | LOCK_EX);

}
?>