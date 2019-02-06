<?php

namespace Application\Components;

abstract class AbstractBase
{
    public function clearStr($str)
    {
        return trim(htmlentities($str));
    }

    public function clearInt($int)
    {
        return abs((int)$int);
    }

    public function redirectTo($location = false)
    {
        if ($location) {
            header("Location: {$location}");
            exit;
        }
    }

}