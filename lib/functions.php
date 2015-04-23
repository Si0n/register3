<?php
function makeProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
function getCookie($name)
{
    return makeProtect($_COOKIE[$name]);
}
