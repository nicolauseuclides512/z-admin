<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\ongkir\Contracts;


use App\Services\Contracts\RestRemoteContract;

interface ROApiKeyOngkirServiceContract extends RestRemoteContract
{
    public function totalUsage();
}
