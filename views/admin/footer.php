
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/main.js"></script>

<script type="text/javascript">

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

</script>
