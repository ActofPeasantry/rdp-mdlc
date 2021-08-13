<?php

function breadcrumb($pages){
    $result = '';
    $n = count($pages);
    $i = 1;

    foreach($pages as $key => $value){
        if ($i == $n) {
            $result .= '<li class="breadcrumb-item active">' .$key . '</li>';
        }
        else {
            $result .= '<li class="breadcrumb-item">' . '<a href="' . $value . '">' . $key. '</a>' . '</li>';
        }
        $i++;
    }
    // dd($result);
    return $result;
}
