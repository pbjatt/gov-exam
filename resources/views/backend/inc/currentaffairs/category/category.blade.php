<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ isset($currentaffaircategory) ? 'Edit Current Affair Category' : 'Add Current Affair Category' }}</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.currentaffaircategory.index') }}">Current Affair Category</a>
                        </li>
                        <li class="breadcrumb-item active">{{ isset($currentaffaircategory) ? 'Edit Current Affair Category' : 'Add Current Affair Category' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>{{ isset($currentaffaircategory) ? 'Edit Current Affair Category' : 'Add Current Affair Category' }}</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ route('admin.currentaffaircategory.index') }}" class="btn btn-primary" style="padding-top: 8px;">View Current Affair Category</a></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                @if(isset($currentaffaircategory))
                                {{ Form::open(['url' => route('admin.currentaffaircategory.update', $currentaffaircategory->id), 'method'=>'PUT', 'files' => true, 'class' => 'user']) }}
                                @else
                                {{ Form::open(['url' => route('admin.currentaffaircategory.store'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
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
                                        {{Form::text('currentaffaircategory[title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Current Affair Category name','required'=>'required'])}}
                                        {{Form::label('name', 'Enter Current Affair Category name'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{ Form::textarea('currentaffaircategory[description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter Current Affair Category description']) }}
                                    </div>

                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" name="save" value="{{ isset($currentaffaircategory) ? 'Update' : 'Add' }}" />
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