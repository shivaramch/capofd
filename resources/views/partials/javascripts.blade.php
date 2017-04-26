
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
<script src="http://demo.expertphp.in/js/jquery.js"></script>
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script >

<script src="{{ url ('js') }}/bootstrap.min.js"></script>

<script type="text/javascript">$('.tip').tooltip()</script>

<script>
    $(document).ready(function () {
        $(".datepicker1").datepicker({
            onClose: function () {
                var date2 = $('.datepicker1').datepicker('getDate');
                date2.setDate(date2.getDate() + 30)
                $(".datepicker2").datepicker("setDate", date2);
                var date3 = $('.datepicker1').datepicker('getDate');
                date3.setDate(date3.getDate() + 0)
                $(".datepicker32").datepicker("setDate", date3);
            }
        });
        $(".datepicker2").datepicker();
        $(".datepicker32").datepicker();
    });
</script> 

<script>
$(function addZero() {


    $('#text1').change( function () {
        var text1 = $('#text1');
        var text2 = $('#text2');
        
        
        
        if($('#text1').val().length == 7)
        {
        text2.val(parseInt(text1.val()));   
        }
		else if($('#text1').val().length == 6)
        {
        text2.val(parseInt('0' + text1.val()));   
        }
       else if($('#text1').val().length == 5)
        {
        text2.val(parseInt('00' + text1.val()));   
        }
		else if($('#text1').val().length == 4)
        {
        text2.val(parseInt('000' + text1.val()));   
        }
		else if($('#text1').val().length == 3)
		{
        text2.val(parseInt('0000' + text1.val()));   
        }
		else if($('#text1').val().length == 2)
        {
        text2.val(parseInt('00000' + text1.val()));   
        }
		else if($('#text1').val().length == 1)
        {
        text2.val(parseInt('000000' + text1.val()));   
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