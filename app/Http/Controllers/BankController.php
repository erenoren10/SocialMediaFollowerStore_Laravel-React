<?php

namespace App\Http\Controllers;

use App\Models\bank;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BankController extends Controller
{
    public function DeleteBank($id)
    {
        $bank = bank::findOrFail($id);

        bank::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Bank Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function AllBank()
    {
        $bank = bank::latest()->get();
        return view('admin.bank.bank_all', compact('bank'));
    }

    public function AddBank()
    {
        return view('admin.bank.bank_add');
    }

    public function StoreBank(Request $request)
    {

        bank::insert([
            'bank_name' => $request->bank_name,
            'recipient_name' => $request->recipient_name,
            'branch_code' => $request->branch_code,
            'account_number' => $request->account_number,
            'IBAN' => $request->IBAN,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Bank Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.bank')->with($notification);
    }

    public function EditBank($id)
    {
        $bank = bank::findOrFail($id);
        return view('admin.bank.bank_edit', compact('bank'));
    }

    public function UpdateBank(Request $request)
    {
        $bank_id = $request->id;

            bank::findOrFail($bank_id)->update([
                'bank_name' => $request->bank_name,
                'recipient_name' => $request->recipient_name,
                'branch_code' => $request->branch_code,
                'account_number' => $request->account_number,
                'IBAN' => $request->IBAN,
            ]);
            $notification = array(
                'message' => 'Bank Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.bank')->with($notification);
    }

    public function BankDetails($id)
    {
        $bank = bank::findOrFail($id);
        $all_bank = bank::latest()->limit(5)->get();
        return view('bankdetay', compact('bank','all_bank'));
    }

    public function HomeBank()
    {
        $all_bank = bank::latest()->get();
        return view('bank', compact('all_bank',));
    }
    public function getBankInfo($id)
    {
        $bankInfo = Bank::find($id); // Veritabanından banka bilgilerini çekme işlemi
      
        if (!$bankInfo) {
            return response()->json(['error' => 'Banka bilgisi bulunamadı'], 404);
        }else{
        return response()->json($bankInfo);
        }
    }
}
