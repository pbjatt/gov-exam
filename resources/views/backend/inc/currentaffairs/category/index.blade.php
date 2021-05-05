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
                                Current Affair Category List
                            </b>
                        </h2>
                        <h2 class="m-r--5"><a href="{{ route('admin.currentaffaircategory.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Current Affair Category</a></h2>
                    </div>
                    <div class="body">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list" id="currentaffaircategory">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($currentaffaircategory as $list)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $list->title }}</td>
                                        <td>{{ $list->description }}</td>
                                        <td>{{ $list->categories }}</td>

                                        <td>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('admin.currentaffaircategory.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
                                            <!-- {{ Form::open(array('url' => route('admin.currentaffaircategory.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn tblActnBtn">
                                                <a style="color: black;"><i class="material-icons">delete</i></a>
                                            </button>
                                            {{ Form::close() }} -->
                                            <button class="btn tblActnBtn" onclick="handleDelete({{$list->id}})">
                                                <a style="color: black;"><i class="fa fa-trash"></i></a>
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
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteFormModal')
        var url = window.location.pathname;

        form.action = url + '/' + id

        $('#deleteModal').modal('show')
    }
</script>