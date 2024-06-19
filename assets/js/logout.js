$(document).ready(function(){
    $('#logout').click(function(){
        $.ajax({
            url: 'assets/php/logout.php',
            type: 'POST',
            dataType: 'json',
            success: function(response){
                // console.log(response);
                if(response.success){
                    window.location.href='login.php';
                    toastr.success(response.message);
                }else{
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error){
                console.log('AJAX error: ' + status + ' - ' + error);
            }
        });
    });
});
