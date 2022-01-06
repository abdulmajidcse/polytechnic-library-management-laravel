
    <!--footer-->
    <footer class="p-2">
        <div class="container-fluid text-center mt-1">
            <p class="text-white h5 font-weight-bold m-auto p-3">Copyright &copy; {{ date("Y") }} {{ config('app.name') }}</p>
        </div>
    </footer><!--end of footer-->


<!--back to top-->
<button class="btn btn-sm btn-outline-success" onclick="topFunction()" id="backtotop"><i class="fas fa-arrow-alt-circle-up h3"></i></button>
<!--end of back to top-->





<!--w3 css some modal are here-->

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <div class="w3-modal-content w3-animate-zoom">
    <img src="" id="modalimg" style="width:100%;cursor:zoom-out;">
  </div>
</div>


<!--end of w3 css some modal are here-->



<!--jquery and bootstrap js script-->
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!--bootstrap js-->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--toaster alert js-->
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
<!--sweet alert js-->
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
<!--custom js script-->
<script type="text/javascript" src="{{ asset('js/style.js') }}"></script>

<script type="text/javascript">
	//form submit message**********
	@if(Session::has('message'))
	  var type = "{{ Session::get('alert-type') }}";
	  switch(type){
	    case 'success':
	      toastr["success"]("{{ Session::get('message') }}", "Success!");
	      break;
	    case 'info':
	      toastr["info"]("{{ Session::get('message') }}", "Information!");
	      break;
	    case 'warning':
	      toastr["warning"]("{{ Session::get('message') }}", "Warning!");
	      break;
	    case 'error':
	      toastr["error"]("{{ Session::get('message') }}", "Error!");
	  }
	@endif //end of form submit message**********

	$(document).ready(function(){
	  //select all roll number or pims number**********
	  $("#person").change(function(){
	    var person = $(this).val();
	    $.get(
	      "{{ URL::to('/borrow/select/user') }}/"+person,
	      function(data){
	        $("#library_user").html(data);
	     }
	    );
	  });//end of select all roll number or pims number**********

	  //select all book by category**********
	  $("#category_id").change(function(){
	    var category_id = $(this).val();
	    $.get(
	      "{{ URL::to('/borrow/select/book') }}/"+category_id,
	      function(data){
	        $("#bookByCategory").html(data);
	     }
	    );
	  });//end of select all book by category**********
	});

  

</script>

</body>
</html>