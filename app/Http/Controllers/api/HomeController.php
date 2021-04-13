<?php

namespace App\Http\Controllers\api;

use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Exam_category;
use App\Model\NotificationInfo;
use App\Model\ExamNotification;
use App\Model\Exam;
use App\Model\Blog;

class HomeController extends Controller
{
    public function category()
    {
        $category = Exam_category::get();

        $re = [
            'status'   => true,
            'data'     => $category
        ];

        return response()->json($re);
    }

    public function exam()
    {
        $exam = Exam::get();

        $re = [
            'status'   => true,
            'data'     => $exam
        ];
        return response()->json($re);
    }

    public function blog()
    {
        $blog = Blog::with('user', 'category')->get();

        $re = [
            'status'   => true,
            'data'     => $blog
        ];
        return response()->json($re);
    }
    public function notification()
    {
        $lists = ExamNotification::with('notificationdetail')->get();
        $re = [
            'status'   => true,
            'data'     => $lists
        ];
        return response()->json($re);
    }
    public function notificationdetails($slug)
    {
        $lists = ExamNotification::with('notificationdetail')->where('slug', $slug)->firstOrFail();

        $infodata = NotificationInfo::with('infotype')->where('examnotification_id', $lists->id)->get();
        $lists->infodata = $infodata;

        $re = [
            'status'   => true,
            'data'     => $lists
        ];
        return response()->json($re);
    }

    public function testquestion($slug)
    {
        $lists = ExamNotification::with('notificationdetail')->where('slug', $slug)->firstOrFail();

        $infodata = NotificationInfo::with('infotype')->where('examnotification_id', $lists->id)->get();
        $lists->infodata = $infodata;

        $re = [
            'status'   => true,
            'data'     => $lists
        ];
        return response()->json($re);
    }
}
