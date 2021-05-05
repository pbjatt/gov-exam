@php
$guardData = Auth::guard()->user();
@endphp
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Exam Notification
                            </h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.notification.master') }}">Master</a>
                        </li>
                        <li class="breadcrumb-item active">Exam Notification
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">

                        <h2 class="pt-2"><b>Exam Notification
                            </b></h2>
                        <h2 class="header-dropdown m-r--5"><a href="{{ route('admin.examnotification.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Exam Notification</a></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Exam Name</th>
                                        <th>Image</th>
                                        <th>Url</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        <th>Visiable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists as $key => $list)
                                    @php
                                    $sn = $key + 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $list->title }}</td>
                                        <td>{{ $list->exam->name }}</td>
                                        <td class="table-img" style="width: 10px;">
                                            <img src="{{ url('/').'/images/examnotification/'. $list->image }}" alt="">
                                        </td>
                                        <td>{{ $list->url }}</td>
                                        <td>{{ $list->description }}</td>
                                        <td>
                                            <span class="label l-bg-purple shadow-style">Visiable</span>
                                        </td>
                                        <td>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('admin.examnotification.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
                                            <!-- {{ Form::open(array('url' => route('admin.examnotification.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn tblActnBtn">
                                                <a style="color: black;"><i class="material-icons">delete</i></a>
                                            </button>
                                            {{ Form::close() }} -->
                                            <button class="btn tblActnBtn" onclick="handleDelete({{$list->id}})">
                                                <a style="color: black;"><i class="fa fa-trash"></i></a>
                                            </button>
                                        </td>
                                        <!-- <td>
                                                <button class="btn tblActnBtn">
                                                    <a href="{{ route('admin.examnotification.show',$list->id) }}" style="color: black;"><i class="material-icons">info</i></a>
                                                </button>
                                            </td> -->
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
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteFormModal')
        var url = window.location.pathname;

        form.action = url + '/' + id

        $('#deleteModal').modal('show')
    }
</script>