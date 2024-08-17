<div class="container text-center pt-5 pb-5">
    Website Wisata Danau Labuan Cermin 2024
</div>
<!-- JAVASCRIPT FILES -->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/jquery.sticky.js"></script>
<script src="../../js/aos.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/scrollspy.min.js"></script>
<script src="../../js/custom.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(e) {
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("gallery-item")) {
                const src = e.target.getAttribute("src");
                document.querySelector(".modal-img").src = src;
                const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
                myModal.show();
            }
        });

        document.getElementById('services_id').addEventListener('change', updatePrices);

        function updatePrices() {
            const customerName = document.getElementById('customer_name').value;
            const numberOfDay = parseFloat(document.getElementById('number_of_day').value) || 0; // Convert to number, default to 0 if invalid
            const numberOfParticipants = parseFloat(document.getElementById('number_of_participants').value) || 0; // Convert to number, default to 0 if invalid

            const selectedOptions = Array.from(document.getElementById('services_id').selectedOptions);

            const totalPrice = selectedOptions.reduce((total, option) => {
                const match = option.textContent.match(/\(Rp[0-9.,]+\)/);
                if (match) {
                    const priceString = match[0].replace(/[Rp().]/g, '').replace(/,/, '.');
                    const priceNumber = parseFloat(priceString.split('.').join(''));
                    return total + priceNumber;
                }
                return total;
            }, 0);

            document.getElementById('service-price').innerHTML = totalPrice.toLocaleString(); // Format totalPrice with commas
            document.getElementById('total-price').innerHTML = (numberOfDay * numberOfParticipants * totalPrice).toLocaleString(); // Format the final total price
        }

        document.getElementById('reservation-form').addEventListener('change', updatePrices);
    });
</script>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>

</html>