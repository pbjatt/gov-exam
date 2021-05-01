<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Model\Exam;
use App\Model\Blog;
use App\Model\InfoType;
use App\Model\User;
use App\Model\Age;
use App\Model\Bloglike;
use App\Model\Exam_category;
use App\Model\Qualification;
use App\Model\ExamNotification;
use App\Model\NotificationInfo;
use App\Model\PostComment;

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

    public function blogscroll(Request $request)
    {
        $blogs =  Blog::list();
        $count =  Blog::list()->count();
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

        $blog_list = view('frontend.template.blog_list', compact('blogs'))->render();
        $re = [
            'blog_list' => $blog_list,
            'count' => $count
        ];


        return response()->json($re, 200);
    }

    public function blogcomment(Request $request)
    {
        if ($request->post_type == 'blog') {
            $blog = Blog::find($request->blog_id);
        } else {
            $blog = NotificationInfo::find($request->blog_id);
        }
        // $blog = Blog::list();
        $record = new PostComment();
        $record->blog_id = $request->blog_id;
        $record->post_type = $request->post_type;
        $record->user_id = auth()->user()->id;
        if ($request->comment_id != '') {
            $record->comment_id = $request->comment_id;
        }
        $record->message = $request->message;
        $record->save();

        $comments = PostComment::with('user')->where('post_type', $request->post_type)->where('blog_id', $request->blog_id)->where('comment_id', null)->get();
        foreach ($comments as $key => $comment) {
            $reply = PostComment::with('user')->where('comment_id', $comment->id)->get();
            $comment->replay_comments = $reply;
        }
        $blogcomments = view('frontend.template.postcomment', compact('comments', 'blog'))->render();

        return response()->json($blogcomments, 200);
    }

    public function postshare(Request $request)
    {
        $url = $request->url;
        $html = view('frontend.template.sharemodel', compact('url'))->render();

        return response()->json($html, 200);
    }

    public function bloglike(Request $request)
    {
        $likecount = Bloglike::where('post_type', $request->post_type)->where('blog_id', $request->blog_id)->where('user_id', auth()->user()->id)->count();
        if ($likecount == 0) {
            $record = new Bloglike();
            $record->blog_id = $request->blog_id;
            $record->post_type = $request->post_type;
            $record->user_id = auth()->user()->id;
            $record->save();
            $re = [
                'status' => true,
                'message' => 'Post Like Successfully.'
            ];
        } else {
            $bloglike = Bloglike::where('post_type', $request->post_type)->where('blog_id', $request->blog_id)->where('user_id', auth()->user()->id)->first();
            $bloglike->delete();
            $re = [
                'status' => false,
                'message' => 'Post Unlike Successfully.'
            ];
        }
        return response()->json($re, 200);
    }
}
