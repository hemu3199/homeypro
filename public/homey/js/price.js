
        const basePriceElements = document.querySelectorAll('.inrusd');
        const selectedCurrencyElement = document.querySelector('#selectedCurrency');
        const currencyListItems = document.querySelectorAll('.header-opt-modal-list ul li');

        async function fetchCurrencyData() {
            try {
                const appID = '0290c110862c4e9390ec6bb039a75b01'; // Replace with your Open Exchange Rates app_id
                const response = await fetch(`https://openexchangerates.org/api/latest.json?app_id=${appID}`);
                const data = await response.json();
                return data.rates;
            } catch (error) {
                console.error('Error fetching currency data:', error);
                return null;
            }
        }

        async function convertCurrency(newCurrency, currencyData, basePrices) {
            const conversionRate = currencyData[newCurrency];

            basePriceElements.forEach((priceElement, index) => {
                const basePriceInINR = basePrices[index];
                let convertedPrice;

                if (newCurrency === 'INR') {
                    convertedPrice = basePriceInINR.toFixed(2);
                } else {
                    convertedPrice = (basePriceInINR / currencyData['INR']) * conversionRate;
                    convertedPrice = convertedPrice.toFixed(2);
                }

                priceElement.textContent = `${newCurrency} ${convertedPrice}`;
            });

            // Update the selected currency text in the <span> element
            selectedCurrencyElement.textContent = newCurrency;

            // Update the text of the <li> elements to display the selected currency
            currencyListItems.forEach(item => {
                const currencyCode = item.querySelector('a').getAttribute('data-lantext');
                if (currencyCode === newCurrency) {
                    item.querySelector('a').textContent = newCurrency;
                } else {
                    item.querySelector('a').textContent = currencyCode;
                }
            });

            // Store the selected currency in localStorage
            localStorage.setItem('selectedCurrency', newCurrency);
        }

        async function getBasePrices() {
            const basePrices = [];

            basePriceElements.forEach(priceElement => {
                const basePriceInINR = parseFloat(priceElement.textContent.replace('$', '').trim());
                basePrices.push(basePriceInINR);
            });

            return basePrices;
        }

        async function main() {
            const currencyData = await fetchCurrencyData();
            const basePrices = await getBasePrices();

            // Get the selected currency from localStorage if it exists
            const storedCurrency = localStorage.getItem('selectedCurrency');

            // Set the initial conversion to the stored currency or INR (default currency)
            const initialCurrency = storedCurrency || 'INR';
            await convertCurrency(initialCurrency, currencyData, basePrices);

            document.querySelector('.currency-item .header-opt-modal-list').addEventListener('click', async event => {
                event.preventDefault();
                const selectedCurrency = event.target.getAttribute('data-lantext');
                await convertCurrency(selectedCurrency, currencyData, basePrices);
            });
        }

        main();



        