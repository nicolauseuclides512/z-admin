<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Account;

use App\Exceptions\AppException;
use App\Services\Account\Contracts\UserAccountServiceContract;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserAccountController extends AccountController
{
    protected $layout = 'users';

    protected $name = 'Users';

    protected $redirectTo = '/admin/accounts/users';

    public function __construct(
        Request $request,
        UserAccountServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    protected function fetch(Request $request)
    {
        if ($this->request->expectsJson()) {
            try {
                return $this->jsonGzSuccess($this->service->fetchUsers($request));
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
