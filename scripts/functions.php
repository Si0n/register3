<?php
function htmlProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
