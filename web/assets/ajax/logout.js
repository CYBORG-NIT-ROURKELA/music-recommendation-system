$('#logout').click(() => {

    $.ajax({
        url: '../web/apis/logout.php',
        type: 'POST',
        success: (response) => {
            response = JSON.parse(response);
            swal("Logged out!", "", "success");
            window.location = '../web/views/login.html';
        }
    });
})