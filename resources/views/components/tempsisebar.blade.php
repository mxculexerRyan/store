<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand" style="align-content: center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 30px; height: 30px;  margin: 0px 2px 2px 2px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg><span>Store</span>
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
                <a href="pages/apps/calendar.html" class="nav-link">
                <i class="link-icon" data-feather="home"></i>
                <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">SELL</span>
                </a>
            </li>
            
            <li class="nav-item nav-category">Activities</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#trade" role="button" aria-expanded="false" aria-controls="trade">
                <i class="link-icon" data-feather="activity"></i>
                <span class="link-title">Trade</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="trade">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/email/inbox.html" class="nav-link">Buy</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/read.html" class="nav-link">Sell</a>
                    </li>
                </ul>
                </div>
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
                    <a href="pages/email/inbox.html" class="nav-link">Tags</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/read.html" class="nav-link">Brands</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/compose.html" class="nav-link">Products</a>
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
                    <a href="pages/email/inbox.html" class="nav-link">Buying Price</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/read.html" class="nav-link">Selling Price</a>
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
                    <a href="pages/email/inbox.html" class="nav-link">Debts</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/read.html" class="nav-link">Credits</a>
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
                    <a href="pages/ui-components/alerts.html" class="nav-link">Sales</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/accordion.html" class="nav-link">Purchases</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Stock</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Expenses</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Commisions</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Targets</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Assets</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Capital</a>
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
                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Employees</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Suppliers</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/advanced-ui/sortablejs.html" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Partners</a>
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
                    <a href="pages/general/blank-page.html" class="nav-link">Menu Items</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/general/faq.html" class="nav-link">Recycle bin</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/general/invoice.html" class="nav-link">System Bin</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/general/profile.html" class="nav-link">System Log</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/general/pricing.html" class="nav-link">System Errors</a>
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
                    <a href="pages/auth/register.html" class="nav-link">Register Users</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/auth/login.html" class="nav-link">Elevate Role</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/auth/login.html" class="nav-link">Access Control</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/auth/login.html" class="nav-link">Suspend Account</a>
                    </li>
                </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Documentation</li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                <i class="link-icon" data-feather="help-circle"></i>
                <span class="link-title">Help</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                <i class="link-icon" data-feather="book-open"></i>
                <span class="link-title">Terms & conditions</span>
                </a>
            </li>
        </ul>
    </div>
</nav>