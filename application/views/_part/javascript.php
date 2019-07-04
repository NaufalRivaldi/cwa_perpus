<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<!-- custom JS -->
<script src="<?= base_url('assets/js/custom_script.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });

        $('#table_id').DataTable();
        $('.table_id').DataTable();

        // checkbox
        var checkbox = $('.chck');
        checkbox.change(function(){
            var countcb = checkbox.filter(':checked').length;
            // hapus
            $('.qty').empty();

            // tambah
            var text="";
            var i=0;
            var no=1;
            for(i; i<countcb; i++){
                text += "<input type='number' name='jml[]' class='form-control col-8' placeholder='Ukuran "+no+"'><br>";
                no++;
            }
            $('.qty').append(text);
        });

        // button kembali
        $('.kembali').click(function(){
            var id = $(this).data('id');
            $.get("<?= site_url('baju/kembalibaju/') ?>"+id+"", function(data, status){
                $('.isi-form').empty();
                $('.isi-form').html(data);
            });
        });
    });
</script>