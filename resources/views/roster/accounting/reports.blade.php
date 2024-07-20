<x-pagetop/>
    <div class="page-content">

        <form method="get">
            <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Select Report Range</h4>
                </div>
                <div class="flex-wrap d-flex align-items-center text-nowrap">
                    <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
                        <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                        <input type="text" class="bg-transparent form-control border-primary" placeholder="Select date" data-input name="start_date" id="start_date">
                    </div>
                    <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
                        <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                        <input type="text" class="bg-transparent form-control border-primary" placeholder="Select date" data-input name="end_date" id="end_date">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary btn-icon-text mb-md-0" onclick="getDate()">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Get Report
                    </button>
                </div>
            </div>
        </form>

        <div class="row reportcard d-none" id="reportcard">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <a href="#" class="mt-3 noble-ui-logo logo-light d-block">Kanza <span>Electronics</span></a>                 
                        <p class="mt-1 mb-1"><b>General Report</b></p>
                        {{-- <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                        <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                        <p>Joseph E Carr,<br> 102, 102  Crown Street,<br> London, W3 3PR.</p> --}}
                    </div>
                    <div class="col-lg-3 pe-0">
                        <h6 class="mt-4 text-end fw-normal"><span class="text-muted">Start Date :</span> <span id="dispStart"></span> </h6>
                        <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> <span id="dispEnd"></span></h6>
                        
                        {{-- <h4 class="mt-4 mb-2 fw-bolder text-uppercase text-end">invoice</h4>
                        <h6 class="pb-4 mb-5 text-end"># INV-002308</h6>
                        <p class="mb-1 text-end">Balance Due</p>
                        <h4 class="text-end fw-normal">$ 72,420.00</h4> --}}
                    </div>
                    </div>
                    <div class="mt-2 container-fluid d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>Particulars</th>
                                <th>Amt</th>
                                <th>Particulars</th>
                                <th>Amt</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="text-end">
                                <td class="text-start">Purchase Equivalent</td>
                                <td id="purch_eq"></td>
                                <td class="text-start">Sales</td>
                                <td id="sales_orders"></td>
                            </tr>
                            <tr class="text-end">
                                <td class="text-start">Stock Available</td>
                                <td id="stockData">0</td>
                                <td class="text-start">Expense Transactions</td>
                                <td id="expenses_orders">0</td>
                            </tr>
                            <tr class="text-end">
                                <td class="text-start">Purchase Markups</td>
                                <td id="markup_data">0</td>
                                <td class="text-start">Sales Discount</td>
                                <td id="discount_data" >0</td>
                            </tr>
                            <tr class="text-end">
                                <td class="text-start">Paid Credits</td>
                                <td id="paid_credit">0</td>
                                <td class="text-start">Paid Debts</td>
                                <td id="paid_debts" >0</td>
                            </tr>
                            {{-- <tr class="text-end">
                                <td class="text-start">Sales Overflow</td>
                                <td id="overflow" >0</td>
                                <td class="text-start">Stock Deficiency</td>
                                <td id="stockDef">0</td>
                            </tr> --}}
                            {{-- <tr class="text-end">
                                <td class="text-start">Purchase Replacement</td>
                                <td id="replace">0</td>
                                <td class="text-start">Sales Overflow</td>
                                <td id="" >0</td>
                            </tr> --}}
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                    <div class="row">
                        <div class="mt-2 col-md-6 ms-auto">
                            <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="bg-dark">
                                        <td class="text-bold-800" id="gros_stat">Gross Profit / Loss</td>
                                        <td class="text-bold-800 text-end" id="gros_value">0</td>
                                    </tr>
                                    <tr>
                                        <td>Pending Debts</td>
                                        <td class="text-end text-danger" id="pdebts">0</td>
                                    </tr>
                                    <tr>
                                        <td>Pending Credits</td>
                                        <td class="text-end text-warning" id="pcredits">0</td>
                                    </tr>
                                    <tr>
                                    <tr class="bg-dark">
                                        <td class="text-bold-800">Accounts Receivable</td>
                                        <td class="text-bold-800 text-end" id="account">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container-fluid w-100">
                    <a href="javascript:;" class="mt-4 btn btn-primary float-end ms-2"><i data-feather="send" class="me-3 icon-md"></i>Send Invoice</a>
                    <a href="javascript:;" class="mt-4 btn btn-outline-primary float-end"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/reports.js') }}"></script>
</body>
</html> 