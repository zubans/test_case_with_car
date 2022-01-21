<?php
namespace main;

require 'CarsHelper.php';

use Fields;
use EmptyCarArrayException;
use UnpermitedCarException;

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
    function __construct(array $places, array $cars) {
        $this->places = $places;
        $this->cars = $cars;
    }

   /**
    * @return mixed
    */
    function getResult()
    {
        try {
            $carsHelper = new CarsHelper($this->cars);
        } catch (EmptyCarArrayException $e) {
            return $e->getMessage();
        } catch (UnpermitedCarException $e) {
            return $e->getMessage();
        }

        foreach ($this->cars as $car) {
            if ($carsHelper->isBigCar($car)) {
                $result[] = $carsHelper->usePlaceForBigCar($this->places[0]);

                if ($this->places[0] > 0) {
                    $this->places[0]--;
                }
            } elseif ($carsHelper->isSmallCar($car)) {
                $res = $carsHelper->usePlaceForSmallCar($this->places);

                array_push($result, $res[Fields::RESULT]);
                $this->places = $res[Fields::PLACES];
            } else {
                $result[] = Fields::UNKNOWN_CARD;
            }
        }

        return $result;
    }
}
