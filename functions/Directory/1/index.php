<?php

$root = dirname(__DIR__, 3);

/**
 * Directory
 */
$dir = dir($root . '/functions');
while ($dirname = $dir->read()) {
//    var_dump($dirname);
}

$dir->rewind();
while ($dirname = $dir->read()) {
//    var_dump($dirname);
}


$dir->close();
$handle = opendir($root.'/functions');

while (false !== ($readdir = readdir($handle))) {
    var_dump($readdir);
}

//$dir->handle = opendir($root . '/functions');
//while ($dirname = $dir->read()) {
//    var_dump($dirname);
//}
$dir->close();
