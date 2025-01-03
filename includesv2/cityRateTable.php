<div class="tableSection mt-16">
    <div class="tableContainer">
        <div class="tableHeader">
            <span>Popular Currencies</span>
        </div>
        <div class="tableHeading">
            <span>Currency</span>
            <span>Buy Currency (in INR)</span>
            <span>Sell Currency (in INR)</span>
        </div>
        <div class="tableBody">

            <?php
            // List of currencies with corresponding links and codes
            $currencies = [
                ['code' => 'usd', 'name' => 'United States Dollar', 'flag' => 'us', 'url' => 'https://www.extravelmoney.com/buy-forex/us-dollar/'],
                ['code' => 'eur', 'name' => 'Euro', 'flag' => 'eu', 'url' => 'https://www.extravelmoney.com/buy-forex/euro/'],
                ['code' => 'gbp', 'name' => 'British Pound', 'flag' => 'gb', 'url' => 'https://www.extravelmoney.com/buy-forex/british-pound/'],
                ['code' => 'aud', 'name' => 'Australian Dollar', 'flag' => 'au', 'url' => 'https://www.extravelmoney.com/buy-forex/australian-dollar/'],
                ['code' => 'cad', 'name' => 'Canadian Dollar', 'flag' => 'ca', 'url' => 'https://www.extravelmoney.com/buy-forex/canadian-dollar/'],
                ['code' => 'sgd', 'name' => 'Singapore Dollar', 'flag' => 'sg', 'url' => 'https://www.extravelmoney.com/buy-forex/singapore-dollar/'],
                ['code' => 'aed', 'name' => 'UAE Dirham', 'flag' => 'ae', 'url' => 'https://www.extravelmoney.com/buy-forex/uae-dirham/'],
                ['code' => 'thb', 'name' => 'Thai Baht', 'flag' => 'th', 'url' => 'https://www.extravelmoney.com/buy-forex/thai-baht/']
            ];

            // Dynamically generating table rows for each currency
            foreach ($currencies as $currency) {
                $buyRate = get_bestrate_buysell($currency['code'], $city, 'buy');
                $sellRate = get_bestrate_buysell($currency['code'], $city, 'sell');
                $currencyUrl = $currency['url']; // URL for each currency

                echo "
                <div class='tableRow' data-url='$currencyUrl'>
                    <div class='currencyDetails columnSpec'>
                        <span class='flag-icon icon-dropdown-flag flag-icon-{$currency['flag']}'></span>
                        <div class='curremcyNameContainer'>
                            <p class='currencyShort'>".strtoupper($currency['code'])."</p>
                            <span class='currencyFull'>{$currency['name']}</span>
                        </div>
                    </div>
                    <div class='columnSpec'>
                        <span class='buyValue'>₹$buyRate</span>
                    </div>
                    <div class='columnSpec'>
                        <span class='sellValue'>₹$sellRate</span>
                    </div>
                </div>";
            }
            ?>

        </div>
    </div>
</div>

<script>
// Add click event listener to each table row
document.querySelectorAll('.tableRow').forEach(row => {
    row.addEventListener('click', function() {
        // Get the URL from the data-url attribute and open it in a new tab
        const url = this.getAttribute('data-url');
        window.open(url, '_blank'); // Opens in a new tab
    });
});
</script>
