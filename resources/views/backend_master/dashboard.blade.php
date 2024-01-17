@extends('backend_master.index')
@section('content')
    @php
        use Carbon\Carbon;
        use App\Models\Posts;
        $dailyVisitors = Posts::whereDate('updated_at', Carbon::today())->count();
        $currentMonth = now()->month;
        $visitorsByMonth = DB::table('posts')
            ->whereMonth('updated_at', $currentMonth)
            ->select(DB::raw('MONTH(updated_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->first();
        $totalPosts = Posts::count();
        $totalViews = Posts::sum('views');

    @endphp


    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Visitor Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Visitor <span>|Totla Posts : {{ $totalPosts }} </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart" style="color: #f1be48"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span
                                            style="font-size: 15px;
                                            font-family: Khmer OS Siemreap;
                                            display: flex;
                                            font-weight: 600;
                                            color: #012970;
                                            align-items: flex-end;
                                        ">Today's
                                            Visitors: <h6 style="margin: 0 6px ;color: #a9a9a9"> {{ $dailyVisitors }}</h6>
                                            Views</span>

                                        <span
                                            style="font-size: 15px;
                                            font-family: Khmer OS Siemreap;
                                            display: flex;
                                            font-weight: 600;
                                            color: #012970;
                                            align-items: flex-end;
                                              ">Visitor's
                                            Month:<h6 style="margin: 0 6px ;color: #a9a9a9"> {{ $visitorsByMonth->count }}
                                            </h6>
                                            Views</span>

                                        <span
                                            style="font-size: 15px;
                                            font-family: Khmer OS Siemreap;
                                            display: flex;
                                            font-weight: 600;
                                            color: #012970;
                                            align-items: flex-end;
                                              ">Total
                                            Views:<h6 style="margin: 0 6px ;color: #a9a9a9"> {{ $totalViews }}
                                            </h6>
                                            Views</span>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Customers <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Customers Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
