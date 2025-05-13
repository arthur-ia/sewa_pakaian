<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{route ('Admin.index')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i ></i>SEWA PAKAIAN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('backend/img/yuki.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">User Login</h6>
                        <span>{{$title}}</span>
                    </div>
                </div>
                @if ($title === 'Admin')
                
                <div class="navbar-nav w-100">
                    <a href="{{route ('Admin.index')}}" class="nav-item nav-link @if(!@isset($menu)) active @endif"><i class="fa fa-torii-gate me-2"></i>Dashboard</a>
                  
                    <a href="{{route ('Paymentmethod.index')}}" class="nav-item nav-link @if(@isset($menu) and $menu === 'Payment Method') active @endif"><i class="fa fa-credit-card me-2"></i>Payment Method</a>
                    <a href="{{route ('Clothes.index')}}" class="nav-item nav-link @if(@isset($menu) and $menu === 'Clothes') active @endif"><i class="fa fa-tshirt me-2"></i>Clothes</a>
                    <a href="{{route ('Order.index')}}" class="nav-item nav-link @if(@isset($menu) and $menu === 'Order') active @endif"><i class="fa fa-cart-plus me-2"></i>Orders</a>
                    @elseif($title === 'Courier')
                    <div class="navbar-nav w-100">
                    <a href="courier" class="nav-item nav-link active"><i class="fa fa-torii-gate me-2"></i>Dashboard</a>
                    <a href="courier" class="nav-item nav-link "><i class="fa fa-shipping-fast me-2"></i>Shipping</a>
                
                    @else
                    <div class="navbar-nav w-100">
                    <a href="owner" class="nav-item nav-link active"><i class="fa fa-torii-gate me-2"></i>Dashboard</a>
                    <!-- tachometer-alt -->
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-hotel me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item"><i class= "fas fa-tshirt me-2" ></i>Clothes</a>
                            <a href="typography.html" class="dropdown-item"><i class= "fas fa-shopping-cart me-2" ></i>Orders</a>
                            <a href="element.html" class="dropdown-item"><i class= "fas fa-shipping-fast me-2" ></i>Shipping</a>
                        </div>
                    </div>
                    @endif
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->