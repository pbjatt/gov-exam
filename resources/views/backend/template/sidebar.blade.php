@php
$guard = Auth::guard()->user()->role_id;
$guardData = Auth::guard()->user();
@endphp
<!-- #Top Bar -->
<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar" style="background-color: #353c48;">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <!-- <img src="{{ url('assets/images/user/usrbig6.jpg') }}" class="img-circle user-img-circle" alt="User Image" /> -->
                            <img src="{{ url('extraimage/images.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name"> {{ $guardData->name }} </div>
                        <div class="profile-usertitle-job ">Manager </div>
                    </div>
                </li>
                <li class="active">
                    <a href="{{ url(env('ADMIN_DIR').'/') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <!-- <i class="fas fa-angle-double-down"></i> -->
                        <i class="material-icons">folder</i>
                        <span>Master</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <i class="fas fa-mail-bulk"></i>
                                <span>Age</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('admin.age.create') }}">
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.age.index') }}">
                                        <span>View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <i class="fas fa-mail-bulk"></i>
                                <span>Qualification</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('admin.qualification.create') }}">
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.qualification.index') }}">
                                        <span>View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <i class="fas fa-mail-bulk"></i>
                                <span>Syllabus</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('admin.syllabus.create') }}">
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.syllabus.index') }}">
                                        <span>View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <i class="fas fa-mail-bulk"></i>
                                <span>Info Type</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('admin.infotype.create') }}">
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.infotype.index') }}">
                                        <span>View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="material-icons">shop</i>
                        <span>Exam Category</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('admin.examcategory.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.examcategory.index') }}">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="material-icons">shop</i>
                        <span>Exam</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('admin.exam.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.exam.index') }}">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.notification.master') }}">
                        <i class="material-icons">shop</i>
                        <span>Exam Notification</span>
                    </a>
                </li>


                <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active">SKINS</a>
            </li>
            <li role="presentation">
                <a href="#settings" data-toggle="tab">SETTINGS</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list list-unstyled m-t-20">
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Save
                                            History
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Auto
                                            Submit Issue
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status To All
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>SIDEBAR MENU COLORS</p>
                        <button type="button" class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button" class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>THEME COLORS</p>
                        <button type="button" class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button" class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>Disk Space</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>26% remaining</small>
                            </span>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p>Server Load</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>Highly Loaded</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-green"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-purple"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-cyan"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-red"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-lime"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>