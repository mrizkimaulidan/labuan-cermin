<div class="container text-center pt-5 pb-5">
    Website Wisata Danau Labuan Cermin 2024
</div>
<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/custom.js"></script>
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

        // Add event listener to services_id
        document.getElementById('services_id').addEventListener('change', updatePrices);

        function updatePrices() {
            const customerName = document.getElementById('customer_name').value;
            const numberOfDay = parseFloat(document.getElementById('number_of_day').value) || 0; // Convert to number, default to 0 if invalid
            const numberOfParticipants = parseFloat(document.getElementById('number_of_participants').value) || 0; // Convert to number, default to 0 if invalid

            // Get the selected options
            const selectedOptions = Array.from(document.getElementById('services_id').selectedOptions);

            // Extract and convert the prices from the selected option text, then sum them up
            const totalPrice = selectedOptions.reduce((total, option) => {
                const match = option.textContent.match(/\(Rp[0-9.,]+\)/);
                if (match) {
                    // Remove 'Rp' and parentheses, then replace dots and commas to convert to number
                    const priceString = match[0].replace(/[Rp().]/g, '').replace(/,/, '.');
                    const priceNumber = parseFloat(priceString.split('.').join(''));
                    return total + priceNumber;
                }
                return total;
            }, 0);

            // Update the HTML elements with the calculated prices
            document.getElementById('service-price').innerHTML = totalPrice.toLocaleString(); // Format totalPrice with commas
            document.getElementById('total-price').innerHTML = (numberOfDay * numberOfParticipants * totalPrice).toLocaleString(); // Format the final total price
        }

        // Add event listener to reservation-form
        document.getElementById('reservation-form').addEventListener('change', updatePrices);


    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>