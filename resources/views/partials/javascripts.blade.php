
<script src="http://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>

<script src="{{ url('js') }}/bootstrap-table.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script src="{{ url('js') }}/bootstrap.min.js"></script>

<script type="text/javascript">$('.tip').tooltip()</script>

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>



<script>
    $(document).ready(function () {
        $(".datepicker1").datepicker({
            onClose: function () {
                var date2 = $('.datepicker1').datepicker('getDate');
                date2.setDate(date2.getDate() + 35)
                $(".datepicker2").datepicker("setDate", date2);

                var date3 = $('.datepicker1').datepicker('getDate');
                date3.setDate(date3.getDate() + 0)
                $("#datepicker32").datepicker("setDate", date3);
            }
        });
        $(".datepicker2").datepicker();
        $("#datepicker32").datepicker();


    });
</script>


<script>
    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>


