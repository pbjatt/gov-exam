<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">GST Rate List</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('admin-home') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">GST Rate List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pt-2"><b>GST Rate List</b></h2>
                            <h2 class="header-dropdown m-r--5"><a href="{{ route('admin.gst_rate.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add GST Rate</a></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>GST %</th>
                                            <th>SGST %</th>
                                            <th>CGST %</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sn = $lists->firstItem();
                                        @endphp
                                        @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $list->gst }} %</td>
                                            <td>{{ $list->sgst }} %</td>
                                            <td>{{ $list->cgst }} %</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <a href="{{ route('admin.gst_rate.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                                </button>
                                                {{ Form::open(array('url' => route('admin.gst_rate.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button class="btn tblActnBtn">
                                                    <a style="color: black;"><i class="material-icons">delete</i></a>
                                                </button>
                                                {{ Form::close() }}
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
