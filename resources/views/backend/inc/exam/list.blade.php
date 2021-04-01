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
                                <h4 class="page-title">Exam List
                                </h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('admin-home') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Exam List
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                            <h2 class="pt-2"><b>Exam List
                            </b></h2>
                            <h2 class="header-dropdown m-r--5"><a href="{{ route('admin.exam.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Exam</a></h2>
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
                                            <th>Age</th>
                                            <th>Qualification</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sn = $lists->firstItem();
                                        @endphp
                                        @foreach($lists as $list)

                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->category_id }}</td>
                                            <td class="table-img" style="width: 10%;">
                                                <img src="{{ url('/').'/images/exam/'.$list->image }}" alt="">
                                            </td>
                                            <td>{{ $list->age }}</td>
                                            <td>{{ $list->qualification }}</td>
                                            <td>{{ $list->description }}</td>
                                            <!-- <td>
                                                <span class="label l-bg-purple shadow-style">In Stock</span>
                                            </td> -->
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <a href="{{ route('admin.exam.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                                </button>
                                                {{ Form::open(array('url' => route('admin.exam.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button class="btn tblActnBtn">
                                                    <a style="color: black;"><i class="material-icons">delete</i></a>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <a href="{{ route('admin.exam.show',$list->id) }}" style="color: black;"><i class="material-icons">info</i></a>
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
