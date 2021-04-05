<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Model\Blog;
use App\Model\Exam_category;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();
        $blog = Blog::where('user_id', $guardData->id)->get();

        //for Page title
        $setting = Setting::first();

        // set page and title ------------------
        $page  = 'blog.index';
        $title = 'View Blog';
        $data  = compact('page', 'title', 'blog', 'setting', 'guardData');

        // return data to view
        return view('frontend.layout.user.app', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        // Category Array
        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page  = 'blog.blog';
        $title = 'Add Blog';
        $data  = compact('page', 'title', 'setting', 'examcategoryArr', 'guardData');

        // return data to view
        return view('frontend.layout.user.app', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog();

        if ($request->hasFile('blog_image')) {

            $image       = $request->file('blog_image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/blog/' . $filename));

            $blog->blog_image = $filename;
        }

        $userId = Auth::guard()->user()->id;
        $blog->blog_title = $request->blog_title;
        $blog->blog_slug = Str::slug($request->blog_title.''.$userId, '-');
        $blog->blog_desc = $request->blog_desc;
        $blog->category_id = $request->category_id;
        $blog->blog_seotitle = $request->blog_seotitle;
        $blog->blog_seodescription = $request->blog_seodescription;
        $blog->blog_seokeyword = $request->blog_seokeyword;
        $blog->save();

        return redirect(route('admin.blog.index'))->with('success', 'Blog successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
