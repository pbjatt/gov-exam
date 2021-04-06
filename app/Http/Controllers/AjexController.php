<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Model\Exam;
use App\Model\Age;
use App\Model\Exam_category;
use App\Model\Qualification;
use App\Model\ExamNotification;

class AjexController extends Controller
{
    public function examsearch(Request $request)
    {
        $query = Exam::latest();
        if ($request->age != '') {
            $query->where('age', $request->age);
        }
        if ($request->category != '') {
            $query->where('category_id', $request->category);
        }
        if ($request->qualification != '') {
            $query->where('qualification', $request->qualification);
        }
        $exams = $query->paginate(10);
        // dd($request);


        $exam_list = view('frontend.template.exam_list', compact('exams'))->render();


        return response()->json($exam_list, 200);
    }

    public function search(Request $request)
    {
        if ($request->search != '') {
            $exams = Exam::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
            $li = '';
            foreach ($exams as $product) {
                $li .= '<li><a href="' . $request->base_url . '/exam/' . $product->slug . '">' . $product->name . '</a></li>';
            }
        } else {
            $li = '';
        }

        return response()->json($li, 200);
    }
}
