// Add Event Form Validation
// TODO Add javascript functions to validate Date and Time
$(function() {
    $(".error").hide();
    var empty_field = "This field is required";
    var is_not_number = "This field must be numeric";
    $(".button").click(function() {
	$('.error').hide();
  	var name = $("input#name").val();
  	if (name == "") {
            $("label#name_error").text(empty_field);
            $("label#name_error").show();
            $("input#name").focus();
            return false;
        }
  	var cls = $("input#class").val();
  	if (cls == "") {
            $("label#class_error").text(empty_field);
            $("label#class_error").show();
            $("input#class").focus();
            return false;
        }
  	var sec = $("input#section").val();
  	if (sec == "") {
            $("label#section_error").text(empty_field);
            $("label#section_error").show();
            $("input#section").focus();
            return false;
        }
        var date = $("input#date").val();
  	if (date == "") {
            $("label#date_error").text(empty_field);
            $("label#date_error").show();
            $("input#date").focus();
            return false;
        }
        var time = $("input#time").val();
  	if (time == "") {
            $("label#time_error").text(empty_field);
            $("label#time_error").show();
            $("input#time").focus();
            return false;
        }
        var dur = $("input#duration").val();
  	if (dur == "") {
            $("label#duration_error").text(empty_field);
            $("label#duration_error").show();
            $("input#duration").focus();
            return false;
        }
        var desc = $("textarea#desc").val();
	var dataString = 'title='+name+'&class='+cls+'&section='+sec+'&date='+date+'&time='+time+'&duration='
                         +dur;
	if (desc != "") {
	    dataString = dataString + "&description="+desc;
	}
	$.ajax({
            type: "POST",
            url: "common/addevent.php",
            data: dataString,
            success: function() {
                $('#add-event').hide("fast");
                $('#show_form').show();
                $('#event_add_success').html("<div id='message'></div>");
                $('#message').html("<br/><h5>New Event Added!</h5>").hide().fadeIn(1500);
		$('#message').show().fadeOut(1500);
            }
           });
        return false;
	});
});