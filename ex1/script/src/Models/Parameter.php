<?php

namespace Tocc\One\Models;

class Parameter
{
    /**
     * @param $parameter
     * @return array|void
     */
    public static function getOptionParameter($parameter)
    {
        $option = '';
        array_shift($parameter);
        if (isset($parameter['0'])) {
            if (substr($parameter['0'], 0, 1) == '+') {
                $option = substr(array_shift($parameter), 1);
            }
        } else {
            exit (
            "Usage $> file1 file2 <....> 
                There is no option\n"
            );
        }
        return array('option' => $option, 'parameter' => $parameter);
    }
}