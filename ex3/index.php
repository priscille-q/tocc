<?php
function factorial($factor)
{
    return $factor * calcul($factor-1);
}
function calcul($factor)
{
     return  ($factor == 1)? 1 : $factor * calcul($factor-1);
}

echo factorial(6);
 