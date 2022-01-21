<?php

interface Fields
{
    const
        PLACES       = 'places',
        RESULT       = 'result',
        SMALL_CAR    = 'c',
        BIG_CAR      = 't',
        UNKNOWN_CARD = 'unknown car',
        YES          = 'y',
        NO           = 'n'
    ;

    const
        PERMITED_CARS = [self::SMALL_CAR, self::BIG_CAR];
}
