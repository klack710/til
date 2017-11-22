<?php
$func_method = function() {
    $result = ltrim(strstr(basename('root/my.folder/my.tar.gz'), '.'), '.');
};
$func_preg = function() {
    preg_match('/.*\/.*?\.(.*)/', '/root/my.folder/my.tar.gz', $result);
};
echo "複数関数:処理時間：" . measure($func_method) . "秒\n";
echo "正規表現:処理時間：" . measure($func_preg) . "秒\n";


$tmp = 'root/my.folder/my.tar.gz';
$func_1 = function() {
    basename($tmp);
};
echo '$func_1:処理時間：' . measure($func_1) . "秒\n";
echo basename($tmp);

$tmp = basename('root/my.folder/my.tar.gz');
$func_2 = function() {
    echo strstr($tmp, '.');
};
echo '$func_2:処理時間：' . measure($func_2) . "秒\n";
echo strstr($tmp, '.');

$tmp = strstr($tmp, '.');
$func_3 = function() {
    ltrim($tmp, '.');
};
echo '$func_3:処理時間：' . measure($func_3) . "秒\n";
echo ltrim($tmp, '.');

function measure(\closure $f) {
    $s = microtime(true);
    for ($i = 0; $i < 1000000; $i++) {
        $f();
    }
    $e = microtime(true);

    return $e - $s;
}
