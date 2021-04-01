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
                            <h4 class="page-title">Profile</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            @if($guardData->role_id == '1')
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                            @endif
                            @if($guardData->role_id == '2')
                            <a href="{{ route('shop-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                            @endif
                        </li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Your content goes here  -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="m-b-20">
                        <div class="contact-grid">
                            <div class="profile-header bg-dark">
                                <div class="user-name" style="padding-top: 25px;">{{ $lists->name }}</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <img src="{{ url('extraimage/images.jpg') }}" class="user-img" alt="">
                            <!-- <p>
                                456, Estern evenue, Courtage area,
                                <br />New York
                            </p> -->
                            <div>
                                <span class="phone">
                                    <i class="material-icons">email</i>{{ $lists->email }}</span>
                            </div>
                            <!-- <div class="row">
                                <div class="col-4">
                                    <h5>564</h5>
                                    <small>Following</small>
                                </div>
                                <div class="col-4">
                                    <h5>18k</h5>
                                    <small>Followers</small>
                                </div>
                                <div class="col-4">
                                    <h5>565</h5>
                                    <small>Post</small>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item m-l-10">
                            <a class="nav-link active" data-toggle="tab" href="#about">About</a>
                        </li>
                        <li class="nav-item m-l-10">
                            <a class="nav-link" data-toggle="tab" href="#skills">Skills</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <p class="text-default">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer
                                took a galley of type and scrambled it to make a type specimen book. It has
                                survived
                                not only five centuries, but also the leap into electronic typesetting, remaining
                                essentially
                                unchanged.</p>
                            <small class="text-muted">Email address: </small>
                            <p>john@gmail.com</p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p>+91 1234567890</p>
                            <hr>
                        </div>
                        <div class="tab-pane body" id="skills">
                            <ul class="list-unstyled">
                                <li>
                                    <div>Photoshop</div>
                                    <div class="progress skill-progress m-t-20">
                                        <div class="progress-bar l-bg-green width-per-45" role="progressbar"
                                            aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div>Wordpress</div>
                                    <div class="progress skill-progress m-b-20">
                                        <div class="progress-bar l-bg-orange width-per-38" role="progressbar"
                                            aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div>HTML 5</div>
                                    <div class="progress skill-progress m-b-20">
                                        <div class="progress-bar l-bg-cyan width-per-39" role="progressbar"
                                            aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div>Angular</div>
                                    <div class="progress skill-progress m-b-20">
                                        <div class="progress-bar l-bg-purple width-per-70" role="progressbar"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="profile-tab-box">
                        <div class="p-l-20">
                            <ul class="nav ">
                                <!-- <li class="nav-item tab-all">
                                    <a class="nav-link active show" href="#project" data-toggle="tab">About Me</a>
                                </li> -->
                                <li class="nav-item tab-all p-l-20">
                                    <a class="nav-link active show" href="#usersettings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="project" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2>About</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Emily Smith</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(123) 456 7890</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">johndeo@example.com</p>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">India</p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">Completed my graduation in Arts from the well known and
                                            renowned institution
                                            of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                                            affiliated
                                            to M.S. University. I ranker in University exams from the same
                                            university
                                            from 1996-01.</p>
                                        <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                                            Gujarat
                                            from 2003-2015 </p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when
                                            an unknown printer took a galley of type and scrambled it to make a
                                            type
                                            specimen book. It has survived not only five centuries, but also the
                                            leap
                                            into electronic typesetting, remaining essentially unchanged.</p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="usersettings" aria-expanded="false">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    <strong>Security</strong> Settings</h2>
                            </div>
                            <div class="body">
                                @if($guardData->role_id == '1')
                                {{ Form::open(['url' => url('admin/profile'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
                                @endif
                                @if($guardData->role_id == '2')
                                {{ Form::open(['url' => url('shop/profile'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
                                @endif
                                    @if($message = Session::get('error'))
                                       <div class="alert alert-danger alert-block">
                                         <button type="button" class="close" data-dismiss="alert">x</button>
                                         {{$message}}
                                       </div>
                                    @endif

                                    @if(count($errors->all()))
                                        <div class="alert alert-danger">
                                          <ul>
                                            @foreach($errors->all() as $error)
                                              <li>{{$error}}</li>
                                            @endforeach
                                          </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="name" name="name" class="form-control" value="{{$lists->name}}" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{$lists->email}}" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                    <button class="btn btn-info btn-round">Save Changes</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="header">
                                <h2>
                                    <strong>Account</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize"
                                                placeholder="Address Line 1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check m-l-10">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="checkbox"
                                                        name="checkbox"> Profile Visibility For Everyone
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check m-l-10">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1"
                                                        name="checkbox"> New task notifications
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check m-l-10">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="checkbox2"
                                                        name="checkbox"> New friend request notifications
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-round">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>