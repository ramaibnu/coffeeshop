<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Supplier';
        $data['suppliers'] = Supplier::orderBy('supplier_name')->get();
        return view('pages.supplier.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Supplier::insert([
            'supplier_id'   => str::uuid(),
            'supplier_name' => $request->supplier_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);
        Alert::success('Success', 'Add Data Successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::where('supplier_id', $id)->first();
        Supplier::where('supplier_id', $id)
                ->update([
                    'supplier_name' => $request->supplier_name ?? $supplier->supplier_name,
                    'address'       => $request->address ?? $supplier->address,
                    'phone_number'  => $request->phone_number ?? $supplier->phone_number,
                    'updated_at'    => now(),
                    'updated_by'    => Auth::user()->id
            ]);
        Alert::success('Success', 'Update Data Successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('supplier_id',$id)->delete();
        Alert::success('Success', 'Delete Data Successfully');
        return redirect()->route('supplier.index');
    }
}
