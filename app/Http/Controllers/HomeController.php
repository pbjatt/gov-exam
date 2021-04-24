<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Exam;
use App\Model\User;
use App\Model\NotificationInfo;
use App\Model\Age;
use App\Model\Exam_category;
use App\Model\ExamNotification;
use App\Model\Qualification;
use App\Model\Blog;
use App\Model\InfoType;
use App\Model\Setting;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $notification = ExamNotification::get();
        $exams = Exam::search($request->s);

        $data = compact('exams', 'notification');
        return view('frontend.inc.home', $data);
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
        $exams = $query->paginate(10);
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
        $setting = Setting::first();

        $blogs =  Blog::list();
        foreach ($blogs as $key => $blog) {
            if ($blog->post_type == 'notification') {
                $blog->infotype = InfoType::find($blog->user_id);
                $blog->notification = ExamNotification::find($blog->category_id);
            }
            if ($blog->post_type == 'blog') {
                $blog->user = User::find($blog->user_id);
                $blog->category = Exam_category::find($blog->category_id);
            }
        }

        if ($request->ajax()) {
            $data = compact('exams', 'ageArr', 'categoryArr', 'qualificationArr', 'notification', 'blogs', 'setting');
            return view('frontend.template.exam_list', $data)->render();
        } else {
            $data = compact('exams', 'ageArr', 'categoryArr', 'qualificationArr', 'notification', 'blogs', 'setting');
            return view('frontend.inc.examlist', $data);
        }
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

    public function notificationinfo($slug, $infoslug)
    {
        $lists = ExamNotification::with('notificationdetail')->where('slug', $slug)->firstOrFail();
        $infodata = NotificationInfo::with('infotype')->whereHas('infotype', function ($q) use ($infoslug) {
            $q->where('slug', $infoslug);
        })->where('examnotification_id', $lists->id)->firstOrFail();
        $lists->infodata = $infodata;

        $releted = NotificationInfo::with('infotype')->whereHas('infotype', function ($q) use ($infoslug) {
            $q->whereNotIn('slug', [$infoslug]);
        })->where('examnotification_id', $lists->id)->get();
        // dd($releted);
        $data = compact('lists', 'releted', 'slug');
        return view('frontend.inc.notification-infodetail', $data);
    }

    public function blogdetail($slug)
    {
        $blog = Blog::with('user', 'category')->where('blog_slug', $slug)->first();

        $releted = Blog::with('user', 'category')->where('category_id', $blog->category_id)->whereNotIn('id', [$blog->id])->get();

        $data = compact('blog', 'releted');
        return view('frontend.inc.blogdetail', $data);
    }
}
