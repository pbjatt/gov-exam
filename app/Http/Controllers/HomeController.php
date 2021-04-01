<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Exam;
use App\Model\NotificationInfo;
use App\Model\Age;
use App\Model\Exam_category;
use App\Model\ExamNotification;
use App\Model\Qualification;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.inc.home');
    }

    public function examlist(Request $request)
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
        $exams = $query->get();
        // dd($request);

        $age = Age::get();
        $ageArr  = ['' => 'Age'];
        if (!$age->isEmpty()) {
            foreach ($age as $a) {
                $ageArr[$a->id] = $a->age;
            }
        }

        $category = Exam_category::get();
        $categoryArr  = ['' => 'Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $a) {
                $categoryArr[$a->id] = $a->title;
            }
        }

        $qualification = Qualification::get();
        $qualificationArr  = ['' => 'Qualification'];
        if (!$qualification->isEmpty()) {
            foreach ($qualification as $a) {
                $qualificationArr[$a->id] = $a->title;
            }
        }

        $notification = ExamNotification::get();

        $data = compact('exams', 'ageArr', 'categoryArr', 'qualificationArr', 'notification');
        return view('frontend.inc.examlist', $data);
    }

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
        $exams = $query->get();
        // dd($request);

        $age = Age::get();
        $ageArr  = ['' => 'Age'];
        if (!$age->isEmpty()) {
            foreach ($age as $a) {
                $ageArr[$a->id] = $a->age;
            }
        }

        $category = Exam_category::get();
        $categoryArr  = ['' => 'Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $a) {
                $categoryArr[$a->id] = $a->title;
            }
        }

        $qualification = Qualification::get();
        $qualificationArr  = ['' => 'Qualification'];
        if (!$qualification->isEmpty()) {
            foreach ($qualification as $a) {
                $qualificationArr[$a->id] = $a->title;
            }
        }

        $notification = ExamNotification::get();

        $data = compact('exams', 'ageArr', 'categoryArr', 'qualificationArr', 'notification');
        return response()->json($data);
    }

    public function examdetails($slug)
    {
        $exam = Exam::with('exam_age', 'exam_qualification', 'category')->where('slug', $slug)->first();

        $notification = ExamNotification::where('exam_id', $exam->id)->first();

        $data = compact('exam', 'notification');
        return view('frontend.inc.examdetail', $data);
    }

    public function notification($slug)
    {
        $lists = ExamNotification::with('notificationdetail')->where('slug', $slug)->first();
        $infodata = NotificationInfo::with('infotype')->where('examnotification_id', $lists->id)->get();
        $lists->infodata = $infodata;

        $data = compact('lists');
        return view('frontend.inc.notification', $data);
    }
}