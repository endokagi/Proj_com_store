<?php
function a()
{
    if (true) {
        echo "A TRUE" . '<br>';
        return true;
        
    } else {
        echo "A FALSE" . '<br>';
        return false;
    }
}
function b()
{
    if (false) {
        echo "B TRUE" . '<br>';
        return true;
    } else {
        
        echo "B FALSE" . '<br>';
        return false;
    }
}
function c()
{
    if (true) {
        echo "C TRUE" . '<br>';
        return true;
    } else {
        echo "C FALSE" . '<br>';
        return false;
        
    }
}
$result1 = a();
$result2 = b();
$result3 = c();
$result4 = a();
if ($result1&&$result2&&$result3||$result4) {
    echo "Dongy" . '<br>';
}
