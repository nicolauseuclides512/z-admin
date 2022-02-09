<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Base;


use App\Cores\Request\RequestMod;
use App\Cores\Response\Jsonable;
use App\Cores\TokenGen;
use App\Http\Controllers\Admin\Override\RestControllerTrait;
use App\Http\Controllers\Admin\Override\RestRemoteControllerTrait;
use App\Http\Controllers\Base\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use RestControllerTrait, Jsonable, RequestMod;

    protected $request;

    protected $layout;

    protected $name;

    protected $rootLayout;

    protected $service;

    protected $redirectTo = '/admin';

    public function __construct(Request $request, $service)
    {
        $this->request = $request;
        $this->service = $service;
    }
}
