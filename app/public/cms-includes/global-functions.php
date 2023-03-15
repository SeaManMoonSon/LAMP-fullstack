<?php

/**
 * print_r2 - print_r inside pre tag
 *
 * @param  mixed $a
 * @return void
 */
function print_r2($a)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

/**
 * even - check even numbers
 *
 * @param  int $x
 * @return void
 */
function even(int $x)
{
    return $x % 2 === 0;
}


/**
 * odd - check odd numbers
 *
 * @param  int $x
 * @return void
 */
function odd(int $x)
{
    return $x % 2 !== 0;
}



?>