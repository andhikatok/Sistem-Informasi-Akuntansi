<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
            <div class="position-sticky m-3 sidebar-sticky">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-1 align-items-center align-items-sm-start"
                    id="menu">
                    <li class="nav-item">
                        <a href="/dashboard/home" class="nav-link align-middle px-0">
                            <span class="ms-1 d-none d-sm-inline"><i class="fs-4 bi-house"></i> Home</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/dashboard" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Business
                                Overview</span></a>
                    </li> --}}

                    <li>
                        <a href="/dashboard/ledger" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-collection"></i> <span class="ms-1 d-none d-sm-inline">Reports</span> </a>
                    </li>

                    <li>
                        <hr class="baseline divider">
                    </li>

                    <li>
                        <a href="/dashboard/bank" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-bank"></i> <span class="ms-1 d-none d-sm-inline">Bank And Cash</span> </a>
                    </li>

                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline ">Sales</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/dashboard/sales" class="nav-link px-0"> <span class="d-none d-sm-inline">Sales
                                        Order</span></a>
                            </li>
                            {{-- <li>
                                <a href="/dashboard/detailsales" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Detail Sales</span></a>
                            </li> --}}
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-cart"></i> <span class="ms-1 d-none d-sm-inline ">Purchases</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/dashboard/purchases" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Purchases Order</span></a>
                            </li>
                            {{--  <li>
                                <a href="/dashboard/bills" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Detail Purchases</span></a>
                            </li> --}}
                        </ul>
                    </li>

                    <li>
                        <a href="/dashboard/invoice" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-file-earmark-post-fill"></i> <span
                                class="ms-1 d-none d-sm-inline ">Invoice</span>
                        </a>
                    </li>

                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline ">Charge</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/dashboard/charge" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Expense</span></a>
                            </li>
                            <li>
                                <a href="/dashboard/spending" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Spending</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <hr class="baseline divider">
                    </li>

                    <li>
                        <a href="/dashboard/contact" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-person-video2"></i> <span
                                class="ms-1 d-none d-sm-inline">Contact</span> </a>
                    </li>

                    <li>
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-box2"></i> <span class="ms-1 d-none d-sm-inline">Product</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/dashboard/product" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Items</span></a>
                            </li>
                            <li>
                                <a href="/dashboard/supplier" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Supplier</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/dashboard/outlet" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-geo-alt"></i> <span class="ms-1 d-none d-sm-inline">Outlet</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/employee" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Employee</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                            class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1 text-body">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <div class="navbar-nav">
                            <div class="nav-item m-3">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link px-3 border-0"> Log Out <span
                                            data-feather="log-out"></span></button>
                                </form>
                            </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
