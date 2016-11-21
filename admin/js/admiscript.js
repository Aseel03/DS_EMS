$(document).ready(function() {
  if ($.cookie('show') == null) {
    $('#myModal').modal('show');
    $.cookie('show', { expires: 1 });
  }
});





var datetime = null,date = null;
var update = function () {
    date = moment(new Date())
    datetime.html(date.format(' hh:mm:ss  DD/MM/YYYY '));
};



$(document).ready(

 function(){
 datetime = $('#datetime')
 update();
 setInterval(update,1000);



	$('.mobile-menu-icon').click(function(){
		$('.templatemo-left-nav').slideToggle();
	});


$('#date').datetimepicker({
format: "yyyy-mm-dd",
weekStart: 1,
todayBtn:  1,
autoclose: 1,
todayHighlight: 1,
startView: 2,
minView: 2,
forceParse: 0
    });

 $('#dateofdate').datetimepicker({
format: "yyyy-mm-dd",
weekStart: 1,
todayBtn:  1,
autoclose: 1,
todayHighlight: 1,
startView: 2,
minView: 2,
forceParse: 0
    });







});






