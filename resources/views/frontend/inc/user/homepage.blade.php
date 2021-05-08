    <section class="content">
        <div class="container-fluid">
        @include('frontend.template.user.flash-message')    
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ url(env('ADMIN_DIR').'/') }}">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="">
                        <div class="support-box text-center bg-green">
                            <div class="icon m-b-10">
                                <div class="chart chart-bar">
                                </div>
                            </div>
                            <div class="text m-b-10">
                                Total Products
                            </div>
                            <h3 class="m-b-0">
                                4
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="">
                        <div class="support-box text-center bg-orange">
                            <div class="icon m-b-10">
                                <span class="chart chart-line"></span>
                            </div>
                            <div class="text m-b-10">
                                Orders Received
                            </div>
                            <h3 class="m-b-0">
                                4
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="">
                        <div class="support-box text-center bg-cyan">
                            <div class="icon m-b-10">
                                <div class="chart chart-pie">
                                </div>
                            </div>
                            <div class="text m-b-10">
                                Total Category
                            </div>
                            <h3 class="m-b-0">
                                4
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="">
                        <div class="support-box text-center bg-purple">
                            <div class="icon m-b-10">
                                <div class="chart chart-bar">
                                </div>
                            </div>
                            <div class="text m-b-10">
                                Total Shop
                            </div>
                            <h3 class="m-b-0">
                                4
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>