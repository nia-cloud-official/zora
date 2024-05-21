<?php

function redirect($url)
{
    return header('Location:' . $url);
}
