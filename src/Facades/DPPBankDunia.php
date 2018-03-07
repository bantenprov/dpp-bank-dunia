<?php

namespace Bantenprov\DPPBankDunia\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The DPPBankDunia facade.
 *
 * @package Bantenprov\DPPBankDunia
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DPPBankDuniaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dpp-bank-dunia';
    }
}
