<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index() {
       return view('pages.unit.index', [
            'pageTitle' => '| Unit Management',
            'currPage' => 'unitManagement',
       ]);
    }

    public function getDataJs() {
        $units = Units::orderBy('id', 'asc')->get();

        return response()->json($units);
    }
    public function create() {
        return view('pages.unit.create');
    }

    public function store(Request $request) {
       $this->validate($request, [
            'name' => 'required',
            'lantai' => 'required',
            'area' => 'required',
       ]);

       $units = new Units();
       $units->name = $request->name;
       $units->lantai = $request->lantai;
       $units->area = $request->area;
       $units->save();

       return redirect()
                ->route('unit.show', [$units->id])
                ->with('success_message', 'Successfully Created Unit ! ');
    }

    public function show($id) {
       $unit = Units::where('id', $id)->first();

       return view('pages.unit.show', [
        'unit' => $unit
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'lantai' => 'required',
            'area' => 'required',
        ]);

        $unit = Units::where('id', $id)->first();
        $unit->name = $request->name;
        $unit->lantai = $request->lantai;
        $unit->area = $request->area;
        $unit->save();

        return redirect()
                ->route('unit.show', [$unit->id])
                ->with('success_message', 'Successfully Update Units ! ');
    }

    public function delete($id) {
        $unit = Units::where('id', $id)->delete();

        return redirect()
        ->route('unit.index')
        ->with('success_message', 'Successfully Delete Unit ! ');
    }
}
