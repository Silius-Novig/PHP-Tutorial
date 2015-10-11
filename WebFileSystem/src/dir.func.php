<?php

function readDirectory($path) {
    $handle = opendir($path);
    if (!$handle) {
        return false;
    } else {
        // if dir's name is '0'
        while (($item = readdir($handle)) !== false) {
            //print("ITEM= " . $item . "\t");
            if ($item == '.' || $item == '..' || $item[0] == '.') {
                continue;
            }
            if (is_file($path . "/" . $item)) {
                $ary['file'][] = $item;
            }
            if (is_dir($path . "/" . $item)) {
                $ary['directory'][] = $item;
            }
        }
        // end, close handle
        closedir($handle);
    }
    return $ary;
}

?>
