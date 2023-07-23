	<!-- core:js -->
	<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

	<script src="{{ asset('backend/assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/dropzone/dropzone.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/dropify/dist/dropify.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/pickr/pickr.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/moment/moment.min.js')}}"></script>
	<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
	<script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
	<script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>

	<script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>
	<script src="{{ asset('backend/assets/js/bootstrap-maxlength.js') }}"></script>
	<script src="{{ asset('backend/assets/js/inputmask.js') }}"></script>
	<script src="{{ asset('backend/assets/js/select2.js') }}"></script>
	<script src="{{ asset('backend/assets/js/typeahead.js') }}"></script>
	<script src="{{ asset('backend/assets/js/tags-input.js') }}"></script>
	<script src="{{ asset('backend/assets/js/dropzone.js') }}"></script>
	<script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
	<script src="{{ asset('backend/assets/js/pickr.js') }}"></script>
	<script src="{{ asset('backend/assets/js/flatpickr.js') }}"></script>
	<!-- End custom js for this page -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
	 @if(Session::has('message'))
	 var type = "{{ Session::get('alert-type','info') }}"
	 switch(type){
		case 'info':
		toastr.info(" {{ Session::get('message') }} ");
		break;
	
		case 'success':
		toastr.success(" {{ Session::get('message') }} ");
		break;
	
		case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
		break;
	
		case 'error':
		toastr.error(" {{ Session::get('message') }} ");
		break; 
	 }
	 @endif 
	</script>