<?php

function generateFibonacci($n) {
    $fibo = [];

    if ($n <= 0) {
        return $fibo;
    }

    $fibo[] = 0;

    if ($n == 1) {
        return $fibo;
    }

    $fibo[] = 1;

    for ($i = 2; $i < $n; $i++) {
        $fibo[] = $fibo[$i - 1] + $fibo[$i - 2];
    }

    return $fibo;
}

$fibonacci = generateFibonacci(10);

print_r($fibonacci);

?>