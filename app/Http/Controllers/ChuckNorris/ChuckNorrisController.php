<?php

namespace App\Http\Controllers\ChuckNorris;

use App\Http\Controllers\BaseController;
use App\Services\ChuckNorris\ChuckNorrisService;

class ChuckNorrisController extends BaseController
{
    public function getJoke() {
        return json_encode((new ChuckNorrisService())->getJoke());
    }
}
