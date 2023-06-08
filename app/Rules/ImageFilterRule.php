<?php

namespace App\Rules;

use Illuminate\Validation\Rule;
use \Sightengine\SightengineClient;

class ImageFilterRule implements Rule
{
    public function passes($attribute, $value)
    {
        $client = new SightengineClient(env('SIGHTENGINEUSER'), env('SIGHTENGINEKEY'));
        $output = $client->check(['nudity'])->set_file($value->getPathname());

        return $output->nudity->raw <= 0.5;
    }

    public function message()
    {
        return 'The image contains explicit or inappropriate content.';
    }
}
