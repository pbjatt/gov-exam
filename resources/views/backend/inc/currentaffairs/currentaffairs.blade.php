<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ isset($currentaffair) ? 'Edit Current Affair' : 'Add Current Affair' }}</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.currentaffair.index') }}">Current Affair</a>
                        </li>
                        <li class="breadcrumb-item active">{{ isset($currentaffair) ? 'Edit Current Affair' : 'Add Current Affair' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>{{ isset($currentaffair) ? 'Edit Current Affair' : 'Add Current Affair' }}</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ route('admin.currentaffair.index') }}" class="btn btn-primary" style="padding-top: 8px;">View Current Affair</a></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                @if(isset($currentaffair))
                                {{ Form::open(['url' => route('admin.currentaffair.update', $currentaffair->id), 'method'=>'PUT', 'files' => true, 'class' => 'admin']) }}
                                @else
                                {{ Form::open(['url' => route('admin.currentaffair.store'), 'method'=>'POST', 'files' => true, 'class' => 'admin']) }}
                                @endif
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
                                    <div class="col-lg-12">
                                        {{Form::text('currentaffair[title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Current Affair name','required'=>'required'])}}
                                        {{Form::label('name', 'Enter Current Affair name'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::select('currentaffair[category_id]', $currentaffaircategoryArr,'0', ['class' => 'squareInput des-select form-control'])}}
                                        {{Form::label('record[category_id]', 'Select Current Affair Category'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::file('image',['class'=>'form-control squareInput'])}}
                                        {{Form::label('image', 'Choose image'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('currentaffair[except_text]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter Current Affair Short Description']) }}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('currentaffair[description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter Current Affair description']) }}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('currentaffair[seo_title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Current Affair SEO Title'])}}
                                        {{Form::label('name', 'Enter Current Affair SEO Title'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('currentaffair[seo_keywords]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Current Affair SEO Keyword'])}}
                                        {{Form::label('name', 'Enter Current Affair SEO Keyword'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('currentaffair[seo_description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter Current Affair SEO description']) }}
                                        {{ Form::label('description', 'Enter Current Affair SEO description'), ['class' => 'active'] }}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" name="save" value="{{ isset($currentaffair) ? 'Update' : 'Add' }}" />
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