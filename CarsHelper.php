<?php
namespace main;

require 'Exceptions/EmptyCarArrayException.php';
use EmptyCarArrayException;
use Exception;

class CarsHelper {

    public function __construct(array $cars)
    {
        $this->validate($cars);
    }

    /**
     * @param $car string
     * 
     * @return bool
     */
    public function isBigCar(string $car): bool
    {
        return $car === 't' ? true : false;
    }

    /**
     * @param $car string
     * 
     * @return bool
     */
    public function isSmallCar(string $car): bool
    {
        return $car === 'c' ? true : false;
    }

    public function validate(array $cars)
    {
        if (empty($cars)) {
           echo 'Пустой массив карт';
        }
    }
}
