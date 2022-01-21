<?php
namespace main;

require '../Main.php';

function getMainInstance(array $floors, array $cars) 
{
    return new Main($floors, $cars);
}

function showResult($result)
{
    echo 'Actual result is ';
    if (is_array($result)) {
        foreach ($result as $res) {
            echo $res . ', ';
        }
        echo "\n";
    } else {
        echo $result . "\n";
    }
}

function testCase(array $floors, array $cars, $expectation)
{
    $result = getMainInstance($floors, $cars)->getResult();
    $res = is_array($result) ? implode(', ', $result) : $result;
    $ex = is_array($expectation) ? implode(', ', $expectation)  : $expectation; 

    echo $res === $ex ? 'done' : showResult($res) . 'Your case is     ' . $ex . "\n ,,,,,,,,,,,,,,,,,,,";
    echo "\n";
}
