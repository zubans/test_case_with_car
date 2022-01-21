<?php
namespace main;

require 'Exceptions/EmptyCarArrayException.php';
require 'Exceptions/UnpermitedCarException.php';

require 'Fields.php';

use EmptyCarArrayException;
use UnpermitedCarException;
use Exception;
use Fields;

class CarsHelper
{
    /**
     * @param $cars array
     */
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
        return $car === Fields::BIG_CAR ? true : false;
    }

    /**
     * @param $car string
     * 
     * @return bool
     */
    public function isSmallCar(string $car): bool
    {
        return $car === Fields::SMALL_CAR ? true : false;
    }

    /**
     * @param $place string
     * 
     * @return string
     */
    public function usePlaceForBigCar(int $place): string
    {
        return $place > 0 ? Fields::YES : Fields::NO;
    }

    /**
     * @param $place array
     * 
     * @return array
     */
    public function usePlaceForSmallCar(array $places): array
    {
        $reversedFloors = array_reverse($places);
                foreach (array_keys($reversedFloors) as $key) {
                    if (0 == $reversedFloors[$key]) {
                        if ($key == (count($places) - 1)) {
                            $result = Fields::NO;
                            break;
                        }
                        continue;
                    }

                    $reversedFloors[$key]--;
                    $result = Fields::YES;
                    $places = array_reverse($reversedFloors);
                    break;
                }
        
        return [Fields::PLACES => $places, Fields::RESULT => $result];
    }


    /**
    * @param $cars array
    *
    * @return void 
    */
    protected function validate(array $cars): void
    {
        if (empty($cars)) {
            throw new EmptyCarArrayException('Empty car array');
        }

        foreach ($cars as $car) {
            if (!in_array($car, Fields::PERMITED_CARS)) {
                throw new UnpermitedCarException('Unpermited car');
            }
        }
    }
}
