<?php
function urlIs($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}




function dd($value)             // dump & die function. Very good for finding answers of requests.
{

    echo "<pre>";
    var_dump($value);
    echo "</pre>";


    die();
}



function authorize($condition, $status = Response::UNAUTHORIZED) {
    if(! $condition) {
        abort($status);
    }
}

?>
