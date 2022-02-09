<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Account\Contracts;


use App\Services\Contracts\RestRemoteContract;
use Illuminate\Http\Request;

interface UserAccountServiceContract extends RestRemoteContract
{
    public function fetchUsers(Request $request);
}
