<?php
namespace Vendor\ConcurrentLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class ConcurrentExecutor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'concurrent'; // This must match the Service Provider binding
    }
}
