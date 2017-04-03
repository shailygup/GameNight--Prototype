$(document).ready(function() {

    function loadProfile() {
                $.ajax({
                    url: "./php/users.php",
                    type: "GET",
                    dataType: 'html',
                    success: function(returnedData) {
                        //console.log("cart checkout response: ", returnedData);
                        $("#infoProfile").html(returnedData);
                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });
            }

    loadProfile();


    function loadCover(){
        $.ajax({
                    url: "./php/coverPhoto.php",
                    type: "GET",
                    dataType: 'html',
                    success: function(returnedData) {
                        //console.log("cart checkout response: ", returnedData);
                        $("#j2").html(returnedData);
                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });
    }
    loadCover()
    function loadFriends() {
                $.ajax({
                    url: "./php/friends.php",
                    type: "GET",
                    dataType: 'html',
                    success: function(returnedData) {
                        //console.log("cart checkout response: ", returnedData);
                        $("#friendsList").html(returnedData);
                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });
            }

    loadFriends();


    $("#addUser").submit(function(e) {
                    e.preventDefault();

                    // get values from form
                    var name = $("#addName").val();
                    var userName = $("#addUsername").val();
                    var email = $("#addEmail").val();
                    var password= $("#addPassword").val();
                    var gender = $("#addGender").val();
                    var pic = $("#addPic").val();
                    //console.log(firstName, lastName, userName);

                    $.ajax({
                        url: "./php/users.php",
                        type: "POST",
                        data: {action: "add", newName: name,newUserName: userName, newEmail: email, 
                            newPassword: password, newGender: gender, pic: pic},
                        success: function(returnedData) {
                             // Success message
                            $('#success').html(returnedData);
                            console.log(returnedData);
                            //clear all fields
                            $('#addUser').trigger("reset");
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

    $('#profileUpdate').on('click', '#submitChanges', function(e) {
                e.preventDefault();
                var editedName = $("#name").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var gender = $("#gender").val();
                var privacy = $("#private").val();
                var pic = $("#pic").val();
                var coverPhoto = $("#coverPic").val();
                console.log(editedName, email, username, gender, privacy, pic, coverPhoto);

                $.ajax({
                    url: "./php/users.php",
                    type: "POST",
                    data: {action: "update", newName: editedName, newEmail: email,
                            newGender: gender, privacy: privacy, pic: pic, coverPic: coverPhoto},
                    success: function(returnedData) {
                        // Success message
                            $('#success').html(returnedData);
                            console.log(returnedData);
                            loadProfile();
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
    $('#passUpdate').on('click', '#changePass', function(e) {
                e.preventDefault();
                var editedPass = $("#newPassword").val();
                console.log(editedPass);

                $.ajax({
                    url: "./php/users.php",
                    type: "POST",
                    data: {action: "update", newPassword: editedPass},
                    success: function(returnedData) {
                        // Success message
                            $('#passwordMessage').html(returnedData);
                            //console.log(returnedData);
                            loadProfile();
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