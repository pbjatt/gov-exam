<?php

namespace App\Http\Controllers;

use App\Model\CurrentAffair;
use App\Model\CurrentAffairCategory;
use App\Model\ExamNotification;
use App\Model\Setting;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurrentAffairController extends Controller
{
    public function currentaffair(Request $request)
    {
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

        $setting = Setting::first();

        $status = 1;

        if ($request->ajax()) {

            $currentaffair = CurrentAffair::latest();
            if ($request->date != '') {
                $date = new Carbon($request->date);
                $currentaffair->where('year', $date->year)
                    ->where('month', $date->format('m'))
                    ->where('day', $date->format('d'));
            }
            if ($request->category_id != '') {
                $currentaffair->where('category_id', $request->category_id);
            }

            $currentaffair = $currentaffair->paginate(25);
            $data = compact('setting', 'status', 'notification', 'currentaffair', 'currentaffaircategoryArr');
            return view('frontend.template.currentaffair', $data)->render();
        } else {

            $currentaffair = CurrentAffair::latest();

            if ($request->date != '') {
                $date = new Carbon($request->date);
                $currentaffair->where('year', $date->year)
                    ->where('month', $date->format('m'))
                    ->where('day', $date->format('d'));
            }

            if ($request->category_id != '') {
                $currentaffair->where('category_id', $request->category_id);
            }

            $currentaffair = $currentaffair->paginate(25);
            $data = compact('setting', 'status', 'notification', 'currentaffair', 'currentaffaircategoryArr');
            return view('frontend.inc.currentaffair', $data);
        }
    }

    public function currentaffairsearch(Request $request)
    {
        $currentaffair = CurrentAffair::latest();
        if ($request->date != '') {
            $date = new Carbon($request->date);
            $currentaffair->where('year', $date->year)
                ->where('month', $date->format('m'))
                ->where('day', $date->format('d'));
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
        if ($request->date != '') {
            $date = new Carbon($request->date);
            $currentaffair->where('year', $date->year)
                ->where('month', $date->format('m'))
                ->where('day', $date->format('d'));
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

        // return view('frontend.template.currentpdf' , compact('currentaffair', 'setting'));
        // download PDF file with download method
        return $pdf->download('currentaffairs_' . $setting->title . '.pdf');
    }

    public function currentaffairdetail($slug)
    {
        // Category Array
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();
        $currentaffaircategoryArr  = ['' => 'Select category'];
        if (!$currentaffaircategory->isEmpty()) {
            foreach ($currentaffaircategory as $cat) {
                $currentaffaircategoryArr[$cat->id] = $cat->title;
            }
        }

        $currentaffair = CurrentAffair::where('slug', $slug)->first();

        $releted = CurrentAffair::with('user', 'category')->where('category_id', $currentaffair->category_id)->whereNotIn('id', [$currentaffair->id])->get();

        $data = compact('currentaffair', 'releted', 'currentaffaircategoryArr');
        return view('frontend.inc.currentaffairdetail', $data);
    }
}
