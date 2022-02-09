<?php

namespace App\Http\Controllers\Account;

use App\Exceptions\AppException;
use App\Services\Account\Contracts\OrganizationAccountServiceContract;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Base\Controller;
use Illuminate\Http\Request;

class OrganizationAccountController extends AccountController
{
    protected $layout = 'organizations';

    protected $name = 'Organizations';

    protected $redirectTo = '/admin/accounts/organizations';

    public function __construct(
        Request $request,
        OrganizationAccountServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    protected function fetch(Request $request)
    {
        if ($this->request->expectsJson()) {
            try {
                return $this->jsonGzSuccess($this->service->fetchOrganizations($request));
            } catch (\Exception $e) {
                if ($this->request->expectsJson()) {
                    return $this->jsonExceptions($e);
                }

                session()->flash('errors', $e->getMessage());
                return redirect()->back();
            }
        }

        return view("$this->rootLayout.$this->layout.index");
    }
}
