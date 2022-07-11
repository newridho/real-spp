<!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
    <!-- DataTables -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/DataTables/buttons/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/DataTables/buttons/jszip.min.js"></script>
    <!-- <script src="assets/DataTables/buttons/pdfmake.min.js"></script> -->
    <script src="assets/DataTables/buttons/vfs_fonts.js"></script>
    <script src="assets/DataTables/buttons/buttons.html5.min.js"></script>
    <script src="assets/DataTables/buttons/buttons.print.min.js"></script>
    <script src="assets/js/pro.min.js"></script>
    <script src="assets/js/pro.js"></script>
    <script src="templates/fDataTable.js"></script>
    <script>

        // Animation Modal      
        $('#profil').on('show.bs.modal', function (e) {
            $('.modal .modal-dialog').attr('class', 'modal-dialog flipInX animated');
        });

        $('#gantiPass').on('show.bs.modal', function (e) {
            $('.modal .modal-dialog').attr('class', 'modal-dialog flipInY animated');
        });
      
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
        

      $('.delete-link').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
          title: 'Menghapus data',
          text: "Data akan terhapus secara permanen",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Delete'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Terhapus',
              'Data telah terhapus',
              'success'
            )
          }
        });
      });

      const linkA = [...document.querySelectorAll('.linkA')]
        linkA.forEach(item => {
            item.addEventListener('click', function() {
                linkA.forEach(item => item.classList.remove('active'))
                this.classList.add('active')
            });
        });

    </script>
</html>