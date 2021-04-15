<section class="content">
    <div class="container-fluid">
        @include('frontend.template.user.flash-message')
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ $title }}
                            </h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $title }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">

                        <h2 class="pt-2"><b>Current Affair List
                            </b></h2>
                        <h2 class="header-dropdown m-r--5"><a href="{{ route('user.currentaffair.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Current Affair</a></h2>
                    </div>
                    <div class="body">
                        <div class="formCard">
                            <div class="wrapper">
                                <div class="row mt-4">
                                    <div class="col-lg-3">
                                        {{Form::select('currentaffair[year]', $yearArr,'', ['class' => 'squareInput des-select form-control affairyear currentsearch'])}}
                                        {{Form::label('record[category_id]', 'Select Year'), ['class' => 'active']}}
                                    </div>
                                    <div class="col-lg-3">
                                        {{Form::select('currentaffair[month]', $monthArr,'', ['class' => 'squareInput des-select form-control affairmonth currentsearch'])}}
                                        {{Form::label('record[category_id]', 'Select Month'), ['class' => 'active']}}
                                    </div>
                                    <div class="col-lg-3">
                                        {{Form::select('currentaffair[date]', $dateArr,'', ['class' => 'squareInput des-select form-control affairdate currentsearch'])}}
                                        {{Form::label('record[category_id]', 'Select Date'), ['class' => 'active']}}
                                    </div>
                                    <div class="col-lg-3">
                                        {{Form::select('currentaffair[category_id]', $currentaffaircategoryArr,'', ['class' => 'squareInput des-select form-control affaircategory currentsearch'])}}
                                        {{Form::label('record[category_id]', 'Select Current Affair Category'), ['class' => 'active']}}
                                    </div>
                                    <span id="affairUrl" data-url="{{ route('user.currentaffair.index') }}"></span>
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list" id="currentaffair">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($currentaffair as $list)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $list->title }}</td>
                                        <td>{{ $list->categories }}</td>
                                        <td class="table-img" style="width: 10%;">
                                            <img src="{{ url('/').'/storage/currentaffair/'.$list->image }}" alt="">
                                        </td>
                                        <td>
                                            <span class="label l-bg-purple shadow-style">Visiable</span>
                                        </td>

                                        <td>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.currentaffair.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
                                            {{ Form::open(array('url' => route('user.currentaffair.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn tblActnBtn">
                                                <a style="color: black;"><i class="material-icons">delete</i></a>
                                            </button>
                                            {{ Form::close() }}
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.currentaffair.show',$list->id) }}" style="color: black;"><i class="material-icons">info</i></a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>