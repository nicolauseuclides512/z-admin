<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $layout = 'users';

    public function __construct(Request $request)
    {
        parent::__construct($request, User::inst());
    }
}
