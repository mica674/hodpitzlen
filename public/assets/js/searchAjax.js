$(document).ready(function () {
    $("#live_search").keyup(function(){
        var input = $(this).val();
        // alert(input);

        if (input != "") {//Si champ de recherche pas vide
            $.ajax({
                url:"/views/clients/livesearch.php",
                method:"POST",
                data:{input:input},
                success:function(data) {
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "")
                    $("#patientsList").css("display", "none")
                }
            });
        }else{
            $("#patientsList").css("display", "")
            $("#searchresult").css("display", "none")
        }
    });
})