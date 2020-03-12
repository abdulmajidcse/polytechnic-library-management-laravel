/**
**********************
raw javascript code
**********************
**/

//back to top scroll**********
//Get the button
var mybutton = document.getElementById("backtotop");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}//end of back to top scroll**********

//printDocument by selection area**********
function printContent(printArea){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(printArea).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}//end of printDocument by selection area**********

/**
***************************
end of raw javascript code
***************************
**/



/**
**********************
jquery code
**********************
**/

$(document).ready(function(){ //jquery ready state**********
  //live search**********
	$("#liveSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#liveTable .tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });//end of live search**********
  //image modal js**********
  $("img#imgmodal").click(function(){
    var imgsrc = $(this).attr("src");
    $("#modalimg").attr("src", imgsrc);
  });//end of image modal js**********
});//end of jquery ready state**********

//delete return confirm message**********
$(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  swal({
    title: "Are you want to delete?",
    text: "Once delete, this will be permanently delete!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes!",
    cancelButtonText: "No!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      window.location.href = link;
    } else {
      swal("Cancelled", "Safe data!", "error");
    }
  });
});//end of delete return confirm message**********

/**
**********************
end of jquery code
**********************
**/