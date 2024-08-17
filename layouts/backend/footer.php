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

        $('#services_id, #customer_name, #number_of_day, #number_of_participants').on('change', updatePrices);

        function updatePrices() {
            const customerName = $('#customer_name').val();
            const numberOfDay = parseFloat($('#number_of_day').val()) || 0; // Convert to number, default to 0 if invalid
            const numberOfParticipants = parseFloat($('#number_of_participants').val()) || 0; // Convert to number, default to 0 if invalid

            const selectedOptions = $('#services_id option:selected');

            const totalPrice = selectedOptions.toArray().reduce((total, option) => {
                const match = $(option).text().match(/\(Rp[0-9.,]+\)/);
                if (match) {
                    const priceString = match[0].replace(/[Rp().]/g, '').replace(/,/, '.');
                    const priceNumber = parseFloat(priceString.split('.').join(''));
                    return total + priceNumber;
                }
                return total;
            }, 0);

            $('#service-price').text(totalPrice.toLocaleString()); // Format totalPrice with commas
            $('#total-price').text((numberOfDay * numberOfParticipants * totalPrice).toLocaleString()); // Format the final total price
        }

        // Initial price update on page load
        updatePrices();

    });
</script>
</body>

</html>