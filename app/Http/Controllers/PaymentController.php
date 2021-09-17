<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use DB;
use Session;
class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index')->with('data',Payment::all());
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $db = new Payment;
            $db->bank_name = $request->bank_name;
            $db->account_number = $request->account_number;
            $db->account_name = $request->account_name;
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

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $db = Payment::find($id);
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
