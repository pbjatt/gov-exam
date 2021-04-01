<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Service Edit</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.service.index') }}">Service</a>
                        </li>
                        <li class="breadcrumb-item active">Service Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>Service Edit</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ route('admin.service.index') }}" class="btn btn-primary" style="padding-top: 8px;">View Service</a></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                {{ Form::open(['url' => route('admin.service.update',$service->id), 'method'=>'PUT','files' => true, 'class' => 'user']) }}
                                @include('backend.inc.service._form')
                                    <div class="text-right">
                                        <input type="submit"class="btn btn-primary" name="edit_service" value="Update"/>
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






