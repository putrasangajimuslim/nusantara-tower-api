<?php

namespace App\Http\Controllers;

use App\Models\Tenants;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index() {
       return view('pages.tenant.index', [
            'pageTitle' => '| Tenant Management',
            'currPage' => 'tenantManagement',
       ]);
    }

    public function getDataJs(Request $request) {
        $tenants = Tenants::orderBy('id', 'asc')->get();

        return response()->json($tenants);
    }

    public function create() {
        return view('pages.tenant.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'company' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        $tenants = new Tenants();
        $tenants->company = $request->company;
        $tenants->email = $request->email;
        $tenants->phone = $request->phone_no;
        $tenants->address = $request->address;
        $tenants->save();

        return redirect()
                ->route('tenant.show', [$tenants->id])
                ->with('success_message', 'Successfully Created Tenant ! ');
    }

    public function show($id) {
        $tenant = Tenants::where('id', $id)->first();

        return view('pages.tenant.show', [
            'tenant' => $tenant
        ]);
    }

    public function update(Request $request, $id) {
       $this->validate($request, [
            'company' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        $tenant = Tenants::where('id', $id)->first();
        $tenant->company = $request->company;
        $tenant->email = $request->email;
        $tenant->phone = $request->phone_no;
        $tenant->address = $request->address;
        $tenant->save();

        return redirect()
                ->route('tenant.show', [$tenant->id])
                ->with('success_message', 'Successfully Update Tenant ! ');
    }

    public function delete($id) {
       $tenant = Tenants::where('id', $id)->delete();

       return redirect()
       ->route('tenant.index')
       ->with('success_message', 'Successfully Delete Tenant ! ');
    }
}
