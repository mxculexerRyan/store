<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand" style="align-content: center">
        <i class="mdi mdi-store"></i><span>Store</span>
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="home"></i>
                <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sell') }}" class="nav-link">
                <i class="link-icon" data-feather="shopping-cart"></i>
                <span class="link-title">SELL</span>
                </a>
            </li>
            
            <li class="nav-item nav-category">Activities</li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#trade" role="button" aria-expanded="false" aria-controls="trade">
                <i class="link-icon" data-feather="activity"></i>
                <span class="link-title">Trade</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="trade">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('buy') }}" class="nav-link">Buy</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('sell') }}" class="nav-link">Sell</a>
                    </li>
                </ul>
                </div>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('buy') }}" class="nav-link">
                <i class="link-icon" data-feather="shopping-cart"></i>
                <span class="link-title">BUY</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#products" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">Create Products</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="products">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('tags') }}" class="nav-link">Tags</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('brands') }}" class="nav-link">Brands</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link">Products</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#prices" role="button" aria-expanded="false" aria-controls="prices">
                <i class="link-icon" data-feather="dollar-sign"></i>
                <span class="link-title">Allocate Prices</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="prices">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('sold') }}" class="nav-link">Selling Price</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('bought') }}" class="nav-link">Buying Price</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#loans" role="button" aria-expanded="false" aria-controls="prices">
                <i class="link-icon" data-feather="book"></i>
                <span class="link-title">Register Loans</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="loans">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('debts') }}" class="nav-link">Debts</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('credit') }}" class="nav-link">Credits</a>
                    </li>
                </ul>
                </div>
            </li>
        
            <li class="nav-item nav-category">Roaster</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#accounting" role="button" aria-expanded="false" aria-controls="accounting">
                <i class="link-icon" data-feather="pie-chart"></i>
                <span class="link-title">Accounting</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="accounting">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('sales') }}" class="nav-link">Sales</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('purchases') }}" class="nav-link">Purchases</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('stock') }}" class="nav-link">Stock</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('expenses') }}" class="nav-link">Expenses</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('commisions') }}" class="nav-link">Commisions</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('targerts') }}" class="nav-link">Targets</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('asset') }}" class="nav-link">Assets</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('capital') }}" class="nav-link">Capital</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('budjets') }}" class="nav-link">Budjets</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#humanResource" role="button" aria-expanded="false" aria-controls="humanResource">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Human Resource</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="humanResource">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ asset('employees') }}" class="nav-link">Employees</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('suppliers') }}" class="nav-link">Suppliers</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('customers') }}" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('partners') }}" class="nav-link">Partners</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('service_providers') }}" class="nav-link">Service Providers</a>
                    </li>
                </ul>
                </div>
            </li>
        
            <li class="nav-item nav-category">Configurations</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#operations" role="button" aria-expanded="false" aria-controls="operations">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Operations</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="operations">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ asset('menu_items') }}" class="nav-link">Menu Items</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('recycle_bin') }}" class="nav-link">Recycle bin</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('system_bin') }}" class="nav-link">System Bin</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('system_log') }}" class="nav-link">System Log</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ asset('system_errors') }}" class="nav-link">System Errors</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                <i class="link-icon" data-feather="unlock"></i>
                <span class="link-title">Authentication</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('admin.register') }}" class="nav-link">Register Users</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('elevate') }}" class="nav-link">Elevate Role</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('access_control') }}" class="nav-link">Access Control</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('suspend_account') }}" class="nav-link">Suspend Account</a>
                    </li>
                </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Documentation</li>
            <li class="nav-item">
                <a href="{{ route('help') }}" class="nav-link">
                <i class="link-icon" data-feather="help-circle"></i>
                <span class="link-title">Help</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('terms') }}" class="nav-link">
                <i class="link-icon" data-feather="book-open"></i>
                <span class="link-title">Terms & conditions</span>
                </a>
            </li>
        </ul>
    </div>
</nav>