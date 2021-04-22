<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\UpdateBlogRequest;
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
        $userId = Auth::guard()->user()->id;

        $blog = new Blog($request->blog);
        $blog->blog_slug = Str::slug($request->blog['blog_title'] . '-' . $userId, '-');

        $blog->status = 'pending';

        $blog->user_id = $userId;

        if (!file_exists(public_path('storage/blog/'))) {
            mkdir(public_path('storage/blog/'), 666, true);
        }

        if ($request->hasFile('blog_image')) {

            $image       = $request->file('blog_image');
            // $filename    = $image->getClientOriginalName();
            $name = time() . $blog->blog_slug . '.' . $image->getClientOriginalExtension();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/blog/' . $name));

            $blog->blog_image = $name;
        }

        if (!file_exists(public_path('blog/files'))) {
            mkdir(public_path('blog/files'), 666, true);
        }

        if ($request->hasFile('blog_attachment')) {
            $pdf       = $request->file('blog_attachment');
            // $filename    = $pdf->getClientOriginalName();
            $name = time() . $blog->blog_slug . '.' . $pdf->getClientOriginalExtension();
            $request->blog_attachment->move(public_path('blog/files'), $name);

            $blog->blog_attachment = $name;
        }

        $blog->save();

        return redirect(route('user.blog.index'))->with('success', 'Blog successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        $blog = Blog::findOrFail($blog->id);

        // set page and title ------------------
        $page = 'blog.single';
        $title = $blog->blog_title;
        $data = compact('page', 'title', 'blog', 'setting', 'guardData');
        // return data to view

        return view('frontend.layout.user.app', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        $editData =  ['blog' => $blog->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page = 'blog.blog';
        $title = 'Edit Blog';
        $data = compact('page', 'title', 'examcategoryArr', 'blog', 'setting', 'guardData');
        // return data to view

        return view('frontend.layout.user.app', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $slug = $blog->blog_slug;
        $blogs = $request->blog;

        if (!file_exists(public_path('storage/blog/'))) {
            mkdir(public_path('storage/blog/'), 666, true);
        }

        if ($request->hasFile('blog_image')) {

            if (file_exists(public_path('storage/blog/' . $blog->blog_image))) {
                unlink(public_path('storage/blog/' . $blog->blog_image));
            }

            $image       = $request->file('blog_image');
            $name = time() . $slug . '.' . $image->getClientOriginalExtension();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/blog/' . $name));

            $blog->blog_image = $name;
        }

        if (!file_exists(public_path('blog/files/'))) {
            mkdir(public_path('blog/files/'), 666, true);
        }

        if ($request->hasFile('blog_attachment')) {
            $pdf       = $request->file('blog_attachment');
            $name = time() . $slug . '.' . $pdf->getClientOriginalExtension();
            $request->blog_attachment->move(public_path('blog/files/'), $name);

            $blog->blog_attachment = $name;
        }

        $blog->update($blogs);

        return redirect(route('user.blog.index'))->with('success', 'Blog successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (!empty($blog->blog_image)) {
            if (file_exists(public_path('storage/blog/' . $blog->blog_image))) {
                unlink(public_path('storage/blog/' . $blog->blog_image));
            }
        }
        if (!empty($blog->blog_attachment)) {
            if (file_exists(public_path('blog/files/' . $blog->blog_attachment))) {
                unlink(public_path('blog/files/' . $blog->blog_attachment));
            }
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Success! Blog has been deleted');
    }
}
