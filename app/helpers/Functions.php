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

// app/helpers.php

/**
 * Check if the user is logged in.
 *
 * @return bool True if the user is logged in, false otherwise.
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
