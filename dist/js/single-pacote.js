let labels = [];
let categories = ['adults', 'children', 'babies'];
let ticketsCount = 0;
let validateForm = false;

// localStorage.removeItem('ticketsCount');

categories.forEach(category => {
    document.getElementById(`btn-plus-${category}-count`).addEventListener('click', () => {
        let count = parseInt(document.getElementById(`input-${category}-count`).value);
        count++;
        ticketsCount++;
        document.getElementById(`input-${category}-count`).value = count;
        updateCountLabel(category);
        updateTotalizers();
    });

    document.getElementById(`btn-minus-${category}-count`).addEventListener('click', () => {
        let count = parseInt(document.getElementById(`input-${category}-count`).value);
        if (count > 0) {
            count--;
            ticketsCount--;
            document.getElementById(`input-${category}-count`).value = count;
            updateCountLabel(category);
            updateTotalizers();
        }
    });
});

const select = document.getElementById('period-event');
            
select.addEventListener('change', () => {
    validateForm = select.value !== 'null';
    document.getElementById('btn-reservation-now').disabled = ticketsCount !== 0 && validateForm ? false : true;
});

function updateCountLabel(control) {
    let amount = parseInt(document.getElementById(`input-${control}-count`).value);

    enumCategories.forEach(category => {
        let exist = labels.some(item => item.replace(/^\d+\s*/, '') === category.value);

        if (category.key === control) {
            if (!exist) {
                labels.push(`${amount} ${category.value}`);
            } else {
                labels = labels.filter(item => item.replace(/^\d+\s*/, '')!== category.value);
                labels.push(`${amount} ${category.value}`);
            }
        }
    });

    labels = labels.filter(item => !item.includes('0'));

    labels = labels.sort((a, b) => {
        // Remover números iniciais e espaços
        const textoA = a.replace(/^\d+\s*/, '');
        const textoB = b.replace(/^\d+\s*/, '');
        return textoA.localeCompare(textoB); // Ordenação alfabética
    });

    if (labels.length === 0) document.getElementById('selected-amount-label').textContent = 'Selecione';
    else document.getElementById('selected-amount-label').textContent = labels.join(', ');
}

function updateTotalizers() {
    let subtotal = 0;
    let payment = 0;

    enumCategories.forEach(category => {
        let count = parseInt(document.getElementById(`input-${category.key}-count`).value);
        subtotal += count * category.price;
        payment = subtotal - (subtotal * 0.05);
    });

    document.getElementById('subtotal-label').innerHTML = `<strong>Subtotal: </strong> R$ ${subtotal.toFixed(2)}`;
    document.getElementById('payment-label').innerHTML = `<span class="text-success">Pagando à vista: R$ ${payment.toFixed(2)}</span>`;

    updateTicketsAmount();
}

function updateTicketsAmount() {
    console.log(validateForm);
    
    
    document.getElementById('tickets-count').textContent = ticketsCount > 0 ? ticketsCount : 0;
    document.getElementById('btn-reservation-now').disabled = ticketsCount !== 0 && validateForm ? false : true;

    // if (ticketsCount !== 0 && inputPeriodValidate) {
    //     document.getElementById('tickets-count').textContent = ticketsCount;
    // } else {
    //     document.getElementById('btn-reservation-now').disabled = true;
    // }
}
