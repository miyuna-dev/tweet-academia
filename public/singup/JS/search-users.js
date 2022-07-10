$(document).ready(function(){
    $('#search-user').keyup(function(){

        $('#result-search').html('');
        let user = $(this).val();
        
        if (user != ""){
            $.ajax({
                type: "POST",
                url: "../../app/controller/search-users.php",
                data: "user=" + encodeURIComponent(user),
                success: function (data) {
                    if (data != ""){
                        console.log(data);
                        $('#result-search').append(data);
                    } else {
                        $('#result-search').html('No user found');
                        // document.getElementById('#result-search').innerHTML = "<div class='suggestion'>No user found</div>";
                    }
                }
            });
        }
    })
    
});