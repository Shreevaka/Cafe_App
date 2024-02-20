<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\ClientService;

class ClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ClientService::class;
    }
}
