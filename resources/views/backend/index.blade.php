@extends('layouts.app') @section('dashboard')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{$user}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Produk</h4>
                    </div>
                    <div class="card-body">
                        {{$produk}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Proyek</h4>
                    </div>
                    <div class="card-body">
                        {{$proyek}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Portofolio</h4>
                    </div>
                    <div class="card-body">
                        {{$portofolio}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Week</a>
                            <a href="#" class="btn">Month</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="182"></canvas>
                    <!-- <div class="statistic-details mt-sm-4"> <div
                    class="statistic-details-item"> <span class="text-muted"><span
                    class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span> <div
                    class="detail-value">$243</div> <div class="detail-name">Today's Sales</div>
                    </div> <div class="statistic-details-item"> <span class="text-muted"><span
                    class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span> <div
                    class="detail-value">$2,902</div> <div class="detail-name">This Week's
                    Sales</div> </div> <div class="statistic-details-item"> <span
                    class="text-muted"><span class="text-primary"><i class="fas
                    fa-caret-up"></i></span>9%</span> <div class="detail-value">$12,821</div> <div
                    class="detail-name">This Month's Sales</div> </div> <div
                    class="statistic-details-item"> <span class="text-muted"><span
                    class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span> <div
                    class="detail-value">$92,142</div> <div class="detail-name">This Year's
                    Sales</div> </div> </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Activities</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <img
                                class="mr-3 rounded-circle"
                                width="50"
                                src="{{asset('stisla/dist/assets/img/avatar/avatar-1.png')}}"
                                alt="avatar">
                            <div class="media-body">
                                <div class="media-title"></div>
                                <span class="text-small text-muted"></span>
                            </div>
                        </li>

                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="" class="btn btn-primary btn-lg btn-round">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection