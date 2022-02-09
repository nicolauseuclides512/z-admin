<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Account\Contracts;


use App\Services\Contracts\RestRemoteContract;
use Illuminate\Http\Request;

interface OrganizationAccountServiceContract extends RestRemoteContract
{
    public function fetchOrganizations(Request $request);
}
