<?php


namespace App\Traits;


trait JsonBuilder
{
    public function errorObject($flag, $message = '')
    {
        return ["errors" =>
            ["$flag" =>
                [$message]
            ]
        ];
    }
}
