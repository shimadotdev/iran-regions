<?php

namespace Shimadotdev\IranRegions;

class Iran {

    public static function __callStatic($name, $arguments)
    {
        $modelClass = ucfirst($name);

        if (class_exists("Shimadotdev\\IranRegions\\Models\\{$modelClass}")) {
            return call_user_func_array(["Shimadotdev\\IranRegions\\Models\\{$modelClass}", 'query'], $arguments);
        }
        
        throw new \BadMethodCallException("Method {$name} does not exist.");

    }

}
