<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Blog Add</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('user.blog.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active">Blog Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>Blog Add</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ route('user.blog.index') }}" class="btn btn-primary" style="padding-top: 8px;">View Blog</a></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                {{ Form::open(['url' => route('user.blog.store'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}

                                @if(count($errors->all()))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        {{Form::text('blog_title', '', ['class' => 'squareInput', 'placeholder'=>'Enter Blog name','required'=>'required'])}}
                                        {{Form::label('name', 'Enter Blog name'), ['class' => 'active']}}
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        {{Form::select('category_id', $examcategoryArr,'0', ['class' => 'squareInput des-select form-control'])}}
                                        {{Form::label('record[category_id]', 'Select Blog Category'), ['class' => 'active']}}
                                    </div>
                                   
                                    <div class="col-lg-6">
                                        {{Form::file('blog_image',['class'=>'form-control squareInput'])}}
                                        {{Form::label('image', 'Choose image'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::file('blog_attachment',['class'=>'form-control squareInput'])}}
                                        {{Form::label('image', 'Choose Blog Attachments'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('blog_desc','', ['class'=>'squareInput des-textarea editor', 'placeholder'=>'Enter Blog description']) }}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('blog_seotitle', '', ['class' => 'squareInput', 'placeholder'=>'Enter Blog SEO Title','required'=>'required'])}}
                                        {{Form::label('name', 'Enter Blog SEO Title'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('blog_seokeyword', '', ['class' => 'squareInput', 'placeholder'=>'Enter Blog SEO Keyword','required'=>'required'])}}
                                        {{Form::label('name', 'Enter Blog SEO Keyword'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('blog_seodesc','', ['class'=>'squareInput des-textarea', 'placeholder'=>'Enter Blog SEO description']) }}
                                        {{ Form::label('description', 'Enter Blog SEO description'), ['class' => 'active'] }}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" name="save" value="Add" />
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>