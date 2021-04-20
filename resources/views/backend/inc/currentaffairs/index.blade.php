<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ $title }}
                            </h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
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
                    <div class="header d-flex justify-content-between">

                        <h2 class="pt-2">
                            <b>
                                Current Affair List
                            </b>
                        </h2>
                        <h2 class="m-r--5"><a onclick="handleApply()" class="btn btn-primary" style="padding-top: 8px;"> <i class="fa fa-filter"></i> </a></h2>
                        <h2 class="m-r--5"><a href="{{ route('admin.currentaffair.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Current Affair</a></h2>
                    </div>
                    <div class="body">
                        {{--<div class="formCard">
                            <div class="wrapper">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        {{Form::select('year', $yearArr,'', ['class' => 'squareInput des-select form-control affairyear currentsearch'])}}
                        {{Form::label('record[category_id]', 'Select Year'), ['class' => 'active']}}
                    </div>
                    <div class="col-lg-6">
                        {{Form::select('month', $monthArr,'', ['class' => 'squareInput des-select form-control affairmonth currentsearch'])}}
                        {{Form::label('record[category_id]', 'Select Month'), ['class' => 'active']}}
                    </div>
                    <div class="col-lg-6">
                        {{Form::select('day', $dayArr,'', ['class' => 'squareInput des-select form-control affairday currentsearch'])}}
                        {{Form::label('record[category_id]', 'Select Day'), ['class' => 'active']}}
                    </div>
                    <div class="col-lg-6">
                        {{Form::select('category_id', $currentaffaircategoryArr,'', ['class' => 'squareInput des-select form-control affaircategory currentsearch'])}}
                        {{Form::label('record[category_id]', 'Select Current Affair Category'), ['class' => 'active']}}
                    </div>
                    <span id="affairUrl" data-url="{{ route('admin.search') }}"></span>
                </div>
            </div>
        </div>--}}
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
                                <a href="{{ route('admin.currentaffair.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                            </button>
                            {{ Form::open(array('url' => route('admin.currentaffair.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class="btn tblActnBtn">
                                <a style="color: black;"><i class="material-icons">delete</i></a>
                            </button>
                            {{ Form::close() }}
                            <button class="btn tblActnBtn">
                                <a href="{{ route('admin.currentaffair.show',$list->id) }}" style="color: black;"><i class="material-icons">info</i></a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <form class="" action="" method="GET" id="applyFormModal" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="formCard">
                                <div class="wrapper">
                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            {{Form::select('year', $yearArr,'', ['class' => 'squareInput des-select form-control affairyear currentsearch'])}}
                                            {{Form::label('record[category_id]', 'Select Year'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-6">
                                            {{Form::select('month', $monthArr,'', ['class' => 'squareInput des-select form-control affairmonth currentsearch'])}}
                                            {{Form::label('record[category_id]', 'Select Month'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-6">
                                            {{Form::select('day', $dayArr,'', ['class' => 'squareInput des-select form-control affairday currentsearch'])}}
                                            {{Form::label('record[category_id]', 'Select Day'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-6">
                                            {{Form::select('category_id', $currentaffaircategoryArr,'', ['class' => 'squareInput des-select form-control affaircategory currentsearch'])}}
                                            {{Form::label('record[category_id]', 'Select Current Affair Category'), ['class' => 'active']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="apply" class="btn btn-primary" value="Apply">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

<script>
    function handleApply() {
        var form = document.getElementById('applyFormModal')
        var category_id = document.getElementsByClassName('category_id').val;
        form.action = 'admin/currentaffair'
        $('#applyModal').modal('show')
    }
</script>