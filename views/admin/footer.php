
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp1").change(function() {
        readURL(this);
    });
    $("#imgInp2").change(function() {
        readURL(this);
    });
    $("#imgInp3").change(function() {
        readURL(this);
    });
    $("#imgInp4").change(function() {
        readURL(this);
    });
    $("#imgInp5").change(function() {
        readURL(this);
    });

    let path = window.location.pathname,
        pathBuf = path.split(`/`);
    if (pathBuf[1] == 'admin' && pathBuf[2] == 'setting') {

        let flagCheck = 0;
        if($("#checkbox")[0].className == "on"){
            $("#checkbox").prop("checked", true);
            $(".tiny-input").css("display","block");
            flagCheck = 1;
        } else {
            $(".tiny-input").css("display","none");
            $("#checkbox").prop("checked", false);
            flagCheck = 0;
        }

        $("#checkbox").click(function(e){
            if(flagCheck == 1){
                //off
                $.post("/admin/ajaxTiny/off", {}, function (data) {
                   setTimeout(function () {
                       alert(data);
                   },500)
                });

                $(".tiny-input").css("display","none");
                flagCheck = 0;
            } else {
                //on
                $.post("/admin/ajaxTiny/on", {}, function (data) {
                    setTimeout(function () {
                        alert(data);
                    },500)
                });

                $(".tiny-input").css("display","block");
                flagCheck = 1;
            }

        });

            $("#sendApiKey").click(function (e) {
                let keyApi = $("#apiKey").val();
                $.post("/admin/ajaxTiny/" + keyApi, {}, function (data) {
                    alert(data);
                });
                return false;
            });
        }


    });

</script>
