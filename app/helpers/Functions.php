<?php

function show($input)
{
    echo "<pre>";
    print_r($input);
    echo "</pre>";
}

function esc($str)
{
    return htmlspecialchars($str);
}