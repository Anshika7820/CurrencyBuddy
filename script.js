const API_KEY = '99a0aec004527b1a155623da';
const BASE_URL = `https://v6.exchangerate-api.com/v6/${API_KEY}/latest/`;

// DOM Elements
const amountInput = document.getElementById('amount');
const fromCurrency = document.getElementById('from-currency');
const toCurrency = document.getElementById('to-currency');
const fromFlag = document.getElementById('from-flag');
const toFlag = document.getElementById('to-flag');
const convertBtn = document.getElementById('convert');
const swapBtn = document.getElementById('swap');
const convertedValue = document.getElementById('converted-value');

// Populate currency dropdowns
function populateCurrencies() {
    for (const [code, info] of Object.entries(currencyCodes)) {
        const option1 = document.createElement('option');
        const option2 = document.createElement('option');
        
        option1.value = code;
        option2.value = code;
        option1.textContent = `${info.name} (${code})`;
        option2.textContent = `${info.name} (${code})`;
        
        fromCurrency.appendChild(option1);
        toCurrency.appendChild(option2);
    }
    
    // Set default values
    fromCurrency.value = 'USD';
    toCurrency.value = 'INR';
    updateFlags();
}

// Update flag images
function updateFlags() {
    const fromCode = currencyCodes[fromCurrency.value].code;
    const toCode = currencyCodes[toCurrency.value].code;
    
    fromFlag.src = `https://flagsapi.com/${fromCode}/flat/64.png`;
    toFlag.src = `https://flagsapi.com/${toCode}/flat/64.png`;
}

// Convert currency
async function convertCurrency() {
    const amount = amountInput.value || 1;
    const from = fromCurrency.value;
    const to = toCurrency.value;
    
    try {
        const response = await fetch(`${BASE_URL}${from}`);
        const data = await response.json();
        
        if (data.result === 'success') {
            const rate = data.conversion_rates[to];
            const convertedAmount = (amount * rate).toFixed(2);
            convertedValue.textContent = convertedAmount;
        } else {
            throw new Error('Failed to fetch exchange rates');
        }
    } catch (error) {
        console.error('Error:', error);
        convertedValue.textContent = 'Error';
    }
}

// Swap currencies
function swapCurrencies() {
    const temp = fromCurrency.value;
    fromCurrency.value = toCurrency.value;
    toCurrency.value = temp;
    updateFlags();
    convertCurrency();
}

// Event Listeners
document.addEventListener('DOMContentLoaded', () => {
    populateCurrencies();
    convertCurrency();
});

fromCurrency.addEventListener('change', () => {
    updateFlags();
    convertCurrency();
});

toCurrency.addEventListener('change', () => {
    updateFlags();
    convertCurrency();
});

amountInput.addEventListener('input', convertCurrency);
convertBtn.addEventListener('click', convertCurrency);
swapBtn.addEventListener('click', swapCurrencies); 