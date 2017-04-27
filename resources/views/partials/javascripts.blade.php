
<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>

<script src="{{ url ('js') }}/bootstrap-table.js"></script>

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

<script src="{{ url ('js') }}/bootstrap.min.js"></script>

<script type="text/javascript">$('.tip').tooltip()</script>



<script>
$(function addZero() {


    $('#text1').change( function () {
        var text1 = $('#text1');
        var text2 = $('#text2');
        
        
        
        if($('#text1').val().length == 7)
        {
            parseInt(text2.val( text1.val()));
        }
		else if($('#text1').val().length == 6)
        {
            parseInt(text2.val(('0' + text1.val())));
        }
       else if($('#text1').val().length == 5)
        {
        parseInt(text2.val(('00' + text1.val())));
        }
		else if($('#text1').val().length == 4)
        {
            parseInt(text2.val(('000' + text1.val())));
        }
		else if($('#text1').val().length == 3)
		{
            parseInt(text2.val(('0000' + text1.val())));
        }
		else if($('#text1').val().length == 2)
        {
            parseInt(text2.val(('00000' + text1.val())));
        }
		else if($('#text1').val().length == 1)
        {
            parseInt(text2.val(('000000' + text1.val())));
        }
    });
});
</script>
<script>
    $(function () {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents
				('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });

    });
</script>

<script>
    setTimeout(function() {
        $('.flash').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>

<script>
    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>


<script>
    $(document).ready(function() {
        src = "{{ route('searchajax') }}";
        $("#assignmentinjury").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: src,
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);

                    }
                });
            },
            minLength: 1,
        });
    });
</script>