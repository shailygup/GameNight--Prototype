/*globals $:false */
$(document).ready(function() {

		$('#editProfile').on('click', '.updateUser', function() {

				var editedName = $("#name").val();
				var email = $("#email").val();
				var username = $("#username").val();
				var gender = $("#gender").val();
				var private = $("#private").val();

                $.ajax({
                    url: "./php/users.php",
                    type: "POST",
                    data: {action: "update", newName: editedName, newEmail: email, newUsername: username,
                            newGender: gender, private: private},
                    success: function(returnedData) {
                        // Success message
                            $('#success').html(returnedData);
                            console.log(returnedData);
                            //clear all fields
                            $('#newEvent').trigger("reset");
                        
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