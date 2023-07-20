<x-pagetop/>
    <div class="page-content">

        <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Salesboard</h4>
            </div>
            <div class="flex-wrap d-flex align-items-center text-nowrap">
                <form>
                    @csrf
                    <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
                        <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                        <input type="text" id="selldate" class="bg-transparent form-control border-primary" placeholder="Select date" data-input onchange="newdate();">
                    </div>
                </form>
                <button type="button" class="mb-2 btn btn-primary btn-icon-text mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Sales History
                </button>
            </div>
        </div>
    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script>
</body>
</html> 