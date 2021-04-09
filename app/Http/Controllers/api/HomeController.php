<?php

namespace App\Http\Controllers\api;

use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Exam_category;
use App\Model\Exam;

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
}
