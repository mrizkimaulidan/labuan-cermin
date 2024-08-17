</div>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/dataTables.min.js"></script>
<script src="../../js/dataTables.bootstrap5.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/sweetalert2.all.min.js"></script>
<script>
    $(function() {
        let table = new DataTable('.table');

        $('.delete-button').click(function(e) {
            e.preventDefault()

            Swal.fire({
                title: "Yakin?",
                text: "Data tersebut akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            });
        });
    });
</script>
</body>

</html>