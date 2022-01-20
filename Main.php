<?php
namespace main;

require 'CarsHelper.php';

class Main 
{
    /**
     * @var array
     */
    private $places = [0, 0, 0];

    /**
     * @var array
     */
    private $cars;

    /**
     * @param $place array
     * @param $cars array
     */
    function __construct(array $places, array $cars) { // $places = [3, 4, 2] $cars = ['t', 'c', 'c' , 't']
        $this->places = $places;
        $this->cars = $cars;
    }

   /**
    * @return array
    */
    function getResult(): array
    {
        $carsHelper = new CarsHelper($this->cars);

        foreach ($this->cars as $car) {
            if ($carsHelper->isBigCar($car)) {
                $result[] = $this->fixPlaceCountForBigCar(); //todo fix function for big and small cars
            } elseif ($carsHelper->isSmallCar($car)) {
                $reversedFloors = array_reverse($this->places);
                foreach (array_keys($reversedFloors) as $key) {
                    if (0 == $reversedFloors[$key]) {
                        if ($key == (count($this->places) - 1)) {
                            $result[] = 'n';
                            break;
                        }
                        continue;
                    }

                    $reversedFloors[$key]--;
                    $result[] = 'y';
                    $this->places = array_reverse($reversedFloors);
                    break;
                }
            } else {
                $result[] = 'unknown car type';
            }
            print_r($this->places);
        }

        return $result;
    }

    /**
     * @return string
     */
    private function fixPlaceCountForBigCar(): string
    {
        if ($this->places[0] > 0) {
            $this->places[0]--;
            return 'y';
        }
        
        return 'n';
    }
}
