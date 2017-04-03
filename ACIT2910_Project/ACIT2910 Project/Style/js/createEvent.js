$(document).ready(function() {
	$("#newEvent").submit(function(e) {
                    e.preventDefault();

                    // get values from form
                    var name = $("#eventName").val();
                    var location = $("#eventLocation").val();
                    var sdate = $("#datePicker").val();
                    var stime= $("#timepicker1").val();
                    var edate = $("#datePicker2").val();
                    var etime= $("#timepicker2").val();
                    var member = $("#members").val();
                    //console.log(firstName, lastName, userName);

                    $.ajax({
                        url: "./php/event.php",
                        type: "POST",
                        data: {action: "add", name: name,location: location, sdate: sdate, 
                            stime: stime, edate: edate, etime: etime, member: member},
                        success: function(returnedData) {
                             // Success message
                            
                            // console.log(returnedData);

                            // window.location.href = "./main.php";
                            $('#Eventsuccess').html(returnedData);
                            //clear all fields
                            $('#newEvent').trigger("reset");

                            //redirect createevent page back to homepage. maybe, or jus breaks the page
                            // calendarRedirect();
                            // Javascript URL redirection
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                             console.log(jqXHR.statusText, textStatus);
                        $('#success').html("<div class='alert alert-warning'>");
                            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                .append("</button>");
                            $('#success > .alert-success')
                                .append("<strong>Sorry Something went wrong with our server. Please try again</strong>");
                            $('#success > .alert-success')
                                .append('</div>');
                        }

                    });
                });
});
