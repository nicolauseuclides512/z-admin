<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface RestRemoteContract
{
    public function index(Request $request);

    public function create();

    public function store(Request $request);

    public function show($id);

    public function edit($id);

    public function update($id, Request $request);

    public function destroy($id);

    public function list();
}
