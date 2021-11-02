<?php

function presentPrice($price)
{
    return '$'.number_format($price / 100, 2);
}

function productImage($path)
{
    return ($path != null) && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/no-image.jpg');
}

