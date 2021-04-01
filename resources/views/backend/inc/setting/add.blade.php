<!-- <section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Setting Add</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ url(env('ADMIN_DIR').'/setting') }}">Setting</a>
                        </li>
                        <li class="breadcrumb-item active">Setting Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>Setting Add</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ url(env('ADMIN_DIR').'/setting') }}" class="btn btn-primary" style="padding-top: 8px;">View Setting</a></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                {{ Form::open(['url' => url(env('ADMIN_DIR').'/setting/add'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
                                     @include('backend.inc.setting._form')
                                  <div class="text-right">
                                    <input type="submit"class="btn btn-primary" name="save" value="Add"/>
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



 -->