$.ajax({
    url: '../web/apis/check_login.php',
    type: 'POST',
    success: function(response) {
        // console.log(response);
        response = JSON.parse(response);
        if (response.status == "success") {
            //console.log(response.result);
            // window.location = '../web/index.html';
            // window.location = '../web/views/login.html';
        } else {
            swal('Login to continue!', '', 'error').then((value) => {
                window.location = '../web/views/login.html';
                // window.location = '../web/index.html';
            });
        }
    }
});