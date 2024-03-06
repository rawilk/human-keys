<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Generator
    |--------------------------------------------------------------------------
    |
    | Used to define the generator to use for generating model keys.
    |
    | Supported:
    |    - ksuid (abc_p6UEyCc8D8ecLijAI5zVwOTP3D0)
    |    - snowflake (abc_1537200202186752)
    |
    | Note: Custom generators must implement the contract
    | Rawilk\HumanKeys\Contracts\Generator
    |
    */
    'generator' => \Rawilk\HumanKeys\Generators\KsuidGenerator::class,
];
