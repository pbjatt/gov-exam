<?php

namespace App\Http\Controllers;

use App\Model\CurrentAffair;
use App\Model\CurrentAffairCategory;
use App\Model\ExamNotification;
use App\Model\Setting;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CurrentAffairController extends Controller
{
    public function currentaffair(Request $request)
    {
        $currentaffair = CurrentAffair::latest();
        if ($request->year != '') {
            $currentaffair->where('year', $request->year);
        }
        if ($request->month != '') {
            $currentaffair->where('month', $request->month);
        }
        if ($request->day != '') {
            $currentaffair->where('day', $request->day);
        }
        if ($request->category_id != '') {
            $currentaffair->where('category_id', $request->category_id);
        }

        $currentaffair = $currentaffair->paginate(25);

        //Exam Notification
        $notification = ExamNotification::get();

        // Category Array
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();
        $currentaffaircategoryArr  = ['' => 'Select category'];
        if (!$currentaffaircategory->isEmpty()) {
            foreach ($currentaffaircategory as $cat) {
                $currentaffaircategoryArr[$cat->id] = $cat->title;
            }
        }

        //Year Array
        $yearArr  = ['' => 'Select year'];
        for ($i = date('Y'); $i > 1947; $i--) {
            $yearArr[$i] = $i;
        }

        //Month Array
        $monthArr  = ['' => 'Select Month', '01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.'];

        //Date Array
        $dayArr  = ['' => 'Select day'];
        for ($i = 1; $i <= 31; $i++) {
            $dayArr[$i] = $i;
        }

        $setting = Setting::first();

        $status = 1;

        if ($request->ajax()) {
            $data = compact('setting', 'status', 'notification', 'currentaffair', 'currentaffaircategoryArr', 'yearArr', 'monthArr', 'dayArr');
            return view('frontend.template.currentaffair', $data)->render();
        } else {
            $data = compact('setting', 'status', 'notification', 'currentaffair', 'currentaffaircategoryArr', 'yearArr', 'monthArr', 'dayArr');
            return view('frontend.inc.currentaffair', $data);
        }
    }

    public function currentaffairsearch(Request $request)
    {
        $currentaffair = CurrentAffair::latest();
        if ($request->year != '') {
            $currentaffair->where('year', $request->year);
        }
        if ($request->month != '') {
            $currentaffair->where('month', $request->month);
        }
        if ($request->day != '') {
            $currentaffair->where('day', $request->day);
        }
        if ($request->category_id != '') {
            $currentaffair->where('category_id', $request->category_id);
        }

        $currentaffair = $currentaffair->paginate(25);

        $status = '1';

        $ca_list = view('frontend.template.currentaffair', compact('currentaffair', 'status'))->render();

        return response()->json($ca_list, 200);
    }
    public function currentaffairpdf(Request $request)
    {
        ini_set('max_execution_time', 300);
        $currentaffair = CurrentAffair::latest();
        if ($request->year != '') {
            $currentaffair->where('year', $request->year);
        }
        if ($request->month != '') {
            $currentaffair->where('month', $request->month);
        }
        if ($request->day != '') {
            $currentaffair->where('day', $request->day);
        }
        if ($request->category_id != '') {
            $currentaffair->where('category_id', $request->category_id);
        }
        // retreive all records from db
        $currentaffair = $currentaffair->get();

        $setting = Setting::first();

        // share data to view
        view()->share('currentaffair', $currentaffair);
        $pdf = PDF::loadView('frontend.template.currentpdf', ['currentaffair' => $currentaffair, 'setting' => $setting]);

        // download PDF file with download method
        return $pdf->download('currentaffairs_'.$setting->title.'.pdf');
    }
}
