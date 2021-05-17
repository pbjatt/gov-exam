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

                        <h2 class="pt-2"><b>Blog List
                            </b></h2>
                        <h2 class="header-dropdown m-r--5"><a href="{{ route('user.blog.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Blog</a></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Attachment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($blog as $list)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $list->blog_title }}</td>
                                        <td>{{ $list->categories }}</td>
                                        <td class="table-img" style="width: 10%;">
                                            <img src="{{ url('/').'/storage/blog/'.$list->blog_image }}" alt="">
                                        </td>
                                        <td class="table-img" style="width: 10%;">
                                            <iframe src="{{ url('/').'/blog/files/'.$list->blog_attachment }}" width="100%">
                                            </iframe>
                                            <img src="{{ url('/').'/blog/files/'.$list->blog_attachment }}" alt="">
                                        </td>
                                        <td>
                                            <span class="label l-bg-purple shadow-style">Visiable</span>
                                        </td>

                                        <td>
                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.blog.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                            </button>
                                            
                                            <button class="btn tblActnBtn" onclick="handleDelete({{$list->id}})">
                                                <a style="color: black;"><i class="fa fa-trash"></i></a>
                                            </button>

                                            <button class="btn tblActnBtn">
                                                <a href="{{ route('user.blog.show',$list->id) }}" style="color: black;"><i class="material-icons">info</i></a>
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