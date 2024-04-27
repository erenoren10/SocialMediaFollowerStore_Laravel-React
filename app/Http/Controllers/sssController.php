<?php

namespace App\Http\Controllers;

use App\Models\sss;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class sssController extends Controller
{
    public function index()
    {
        return view('SSS');
    }

    public function Deletesss($id)
    {
        $sss = sss::findOrFail($id);

        sss::findOrFail($id)->delete();

        $notification = array(
            'message' => 'sss Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function Allsss()
    {
        $sss = sss::latest()->get();
        return view('admin.sss.sss_all', compact('sss'));
    }

    public function Addsss()
    {
        return view('admin.sss.sss_add');
    }

    public function Storesss(Request $request)
    {

        sss::insert([
            'sss_questions' => $request->sss_questions,
            'sss_answers' => $request->sss_answers,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'sss Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.sss')->with($notification);
    }

    public function Editsss($id)
    {
        $sss = sss::findOrFail($id);
        return view('admin.sss.sss_edit', compact('sss'));
    }

    public function Updatesss(Request $request)
    {
        $sss_id = $request->id;

        sss::findOrFail($sss_id)->update([
                'sss_questions' => $request->sss_questions,
                'sss_answers' => $request->sss_answers,
            ]);
            $notification = array(
                'message' => 'sss Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.sss')->with($notification);
    }

    public function sssDetails($id)
    {
        $sss = sss::findOrFail($id);
        $all_sss = sss::latest()->limit(5)->get();
        return view('sssdetay', compact('sss','all_sss'));
    }

    public function Homesss()
    {
        $all_sss = sss::latest()->get();
        return view('sss', compact('all_sss',));
    }

}
