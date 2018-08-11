$(document).ready(function () {
	function load_unseen_notification(view = '')
	 {
	  $.ajax({
	   url:"load/notif",
	   method:"POST",
	   data:{view:view},
	   dataType:"json",
	   success: function(data){
	   	$('#notif').html(data.notif);
	   	if(data.unssen_notif > 0){
	   		$('.count').html(data.unssen_notif);
	   	}
	   }
	  });
	 }

	 load_unseen_notification();

	 $('#dropdown-toggle').on('click', function(){
	 	$('.count').html('');
	 	load_unseen_notification('yes');
	 });
	 // setInterval(function(){ 
	 // 	load_unseen_notification();; 
	 // }, 5000);
})