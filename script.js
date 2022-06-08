$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;
var fail= false;
var name;


setProgressBar(current);


// what happens when the user clicks on next button
$(".next").click(function(){

current_fs = $(this).parent();
current_fs.find("input,select,textarea").each(function(){
	if (!$(this).prop("required")) {

	  }else{
	  	var field=$(this).val();
	  	if (field=="") {
	  		fail=true;
	  		$(this).css({
			'border-color': '#ff0000',
			});	
	  	}
	  	else{
	  		fail=false;
	  		$(this).css({
			'border-color': '#28a745',
			});	
	  	}
	  }
   });
    next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
});
///////////////////////////////////////////////


// what happens when the user clicks on previous button

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});
////////////////////////////////////////////////////////

// the progress bar
function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}


$(".submit").click(function(){
	if (fail==true) {
		alert('no submittion');
	}
	else{
			alert("submit");
			$("#msform").submit();

			// Set up an event listener for the contact form.
			// $("#msform").submit(function(e) {
			// 	// Stop the browser from submitting the form.
			// 

			// 	// // Serialize the form data.
			// 	var formData = $("#msform").serialize();

			// 	// Submit the form using AJAX.
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: $("#msform").attr('action'),
			// 		data: formData
			// 	})
			// });
			
			// go to the next step of the form
	        current_fs = $(this).parent();
	        next_fs = $(this).parent().next();

	        //Add Class Active
	        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	        //show the next fieldset
	        next_fs.show();
	        //hide the current fieldset with style
	        current_fs.animate({opacity: 0}, {
	        step: function(now) {
	        // for making fielset appear animation
	        opacity = 1 - now;

	        current_fs.css({
	        'display': 'none',
	        'position': 'relative'
	        });
	        next_fs.css({'opacity': opacity});
	        },
	        duration: 500
	        });
	        setProgressBar(++current);
	   }
    })
});