<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistic;
use DB;
use Session;

class LogisticController extends Controller
{
    public function index()
    {
        return view('logistics.index')->with('data',Logistic::all());
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $db = new Logistic;
            $db->name = $request->name;
            $db->detail = $request->detail;
            $db->price = $request->price;
            $db->save();
            DB::commit();
            Session::flash('message', 'บันทึกสำเร็จ');
            Session::flash('alert-class', 'success');
        } catch (\Exxception $e) {
            DB::rollBack();
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'danger');
        }
        return redirect()->back();
    }


    public function update($id)
    {
        try {
            DB::beginTransaction();
            $db = Logistic::find($id);
            $db->hidden = !$db->hidden;
            $db->update();
            DB::commit();
            return response()->json(['success' => true],200);
        } catch (\Exxception $e) {
            DB::rollBack();
            return response()->json(['success' => false],500);
        } 
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $db = Logistic::find($id);
            $db->delete();
            DB::commit();
            Session::flash('message', 'ลบสำเร็จ');
            Session::flash('alert-class', 'success');
        } catch (\Exxception $e) {
            DB::rollBack();
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'danger');
        } 
        return redirect()->back();
    }
}
