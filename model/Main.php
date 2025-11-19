<?php

foreach (scandir(__DIR__) as $file) {
    if ($file != __FILE__ && $file != '.' && $file != '..') require_once $file;
}

const user = new User('user');

?>