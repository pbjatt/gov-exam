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
                    <div class="header d-flex justify-content-between">

                        <h2 class="pt-2">
                            <b>
                                Question List
                            </b>
                        </h2>
                        <h2 class="m-r--5"><a onclick="handleUpload()" class="btn btn-primary" style="padding-top: 8px;">Upload Excel</a></h2>
                        <h2 class="m-r--5"><a href="{{ route('user.download') }}" class="btn btn-primary" style="padding-top: 8px;">Downlaod Sample Excel</a></h2>
                        <h2 class="m-r--5"><a href="{{ route('user.question.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Question</a></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Questions</th>
                                        <th>Correct Answer</th>
                                        <th>Category</th>
                                        <th>Difficulty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($question as $row)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{!! $row->question !!}</td>
                                        <td>{{ $row->correct_answer }}</td>
                                        <td>{{ $row->categories }}</td>
                                        <td>{{ $row->difficulty }}</td>
                                        <td>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.question.edit',$row->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
         
                                            <button class="btn tblActnBtn" onclick="handleDelete({{$row->id}})">
                                                <a style="color: black;"><i class="fa fa-trash"></i></a>
                                            </button>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.question.show',$row->id) }}" style="color: black;"><i class="material-icons">info</i></a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <form class="" action="" method="POST" id="uploadFormModal" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="modal-content">
                                            <div class="row">
                                                <div class="col-12 my-5">
                                                    {{Form::select('category_id', $examcategoryArr,'0', ['class' => 'squareInput des-select form-control category_id', 'required'=>'required'])}}
                                                </div>
                                                <div class="col-12">
                                                    <input type="file" name="select_file" accept=".xls,.xlsx" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
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
    function handleUpload() {
        var form = document.getElementById('uploadFormModal')
        var category_id = document.getElementsByClassName('category_id').val;
        form.action = 'user/question/import-excel/'
        $('#uploadModal').modal('show')
    }
</script>
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteFormModal')
        var url = window.location.pathname;

        form.action = url + '/' + id

        $('#deleteModal').modal('show')
    }
</script>