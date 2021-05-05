<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Blog List</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Blog List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2 class="pt-2"><b>Blog List</b></h2>
                        <!-- <h2 class="header-dropdown m-r--5"><a href="{{ route('admin.blog.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Blog</a></h2> -->
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <!-- <th>Short Description</th> -->
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = $lists->firstItem();
                                    @endphp
                                    @foreach($lists as $list)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $list->blog_title }}</td>
                                        <td class="table-img" style="width: 10%;">
                                            @if(!empty($list->blog_image))
                                            <img src="{{ url('/').'/storage/blog/'.$list->blog_image }}" alt="">
                                            @else
                                            null
                                            @endif
                                        </td>
                                        <td>{{ $list->category->title }}</td>
                                        <!-- <td>{{ $list->blog_short_desc }}</td> -->
                                        <td>
                                            <!-- <button class="btn tblActnBtn">
                                                <a href="{{ route('admin.blog.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
                                            {{ Form::open(array('url' => route('admin.blog.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn tblActnBtn">
                                                <a style="color: black;"><i class="material-icons">delete</i></a>
                                            </button>
                                            {{ Form::close() }} -->
                                            @if($list->status == 'verified')
                                            <a href="{{ route('admin.blogchangestatus', [$list->id, 'field' => 'status', 'status' => 'pending', 'id' => $list->id]) }}" class="text-success"><button class="btn btn-success">Verified</button></a>
                                            @else
                                            <a href="{{ route('admin.blogchangestatus', [$list->id, 'field' => 'status', 'status' => 'verified', 'id' => $list->id]) }}" class="text-warning"><button class="btn btn-warning">Pending</button></a>
                                            @endif
                                            <!--        
                                            {{ Form::open(array('url' => route('admin.blogchangestatus',$list->id), 'class' => 'btn tblActnBtn', 'id'=>'blogstatuschange')) }}

                                            {{Form::select('status', $statusArr,$list->status, ['class' => 'squareInput des-select form-control','id' => 'blogstatusselect'])}}
                                            {{ Form::close() }} -->
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
    function blogstatusselect() {
        alert('sdkjgdf');
        // Call submit() method on <form id='myform'>
        document.getElementById('myform').submit();
    }
</script>