let labels = [];
let categories = ['adults', 'children', 'babies'];
let ticketsCount = 0;
let validateForm = false;
let enumCategories = sessionStorage.getItem('enumCategories') ? JSON.parse(sessionStorage.getItem('enumCategories')) : [];

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

    // validateReservationButton();
}

// function updateTicketsAmount() {
//     document.getElementById('tickets-count').textContent = ticketsCount > 0 ? ticketsCount : 0;
//     document.getElementById('btn-reservation-now').disabled = ticketsCount !== 0 && validateForm ? false : true;

//     participantesForm(ticketsCount);
//     pricesComponent();
// }

function participantesForm(amount) {
    const original = document.getElementById('accordion-item-1');
    const container = document.getElementById('accordion'); // Certifique-se de que o container existe

    if (original && container) {
        // Limpa os elementos previamente adicionados, se necessário
        container.innerHTML = '';

        for (let i = 1; i <= amount; i++) {
            const clone = original.cloneNode(true); // Clona apenas o original
            clone.id = `accordion-item-${i}`; // Atualiza o ID do clone
            clone.style.display = 'block';

            // Modifica o conteúdo do clone para evitar duplicações
            const button = clone.querySelector('.accordion-button'); // Seletor para o botão
            const collapse = clone.querySelector('.collapse'); // Seletor para o collapse dentro do item
            const form = clone.querySelector('form');

            // Atualiza o botão
            if (button) {
                button.textContent = `Participante ${i}`;
                // Atualiza os atributos do botão
                button.setAttribute('aria-controls', `collapse-${i}`);
                button.setAttribute('data-bs-target', `#collapse-${i}`);
            }

            // Atualiza o collapse
            if (collapse) {
                collapse.id = `collapse-${i}`; // Atualiza o id do collapse para garantir que seja único
            }

            // Se você precisar atualizar atributos, como `data-*` ou `href`, faça aqui
            const link = clone.querySelector('a'); // Exemplo de link dentro do clone
            if (link) {
                link.setAttribute('href', `#item-${i}`);
                link.setAttribute('data-id', `item-${i}`);
            }

            // Atualiza o id do formulário
            if (form) {
                form.id = `form-participante-${i}`; // Atualiza o id do formulário
            }

            // Adiciona o clone ao container
            container.appendChild(clone);
        }
    } else {
        console.error("Elemento original ou container não encontrado.");
    }
}

function pricesComponent() {
    const component = document.querySelector('.event__totalizers');
    const container = document.getElementById('prices');
    const clone = component.cloneNode(true);
    
    if (component && container) {
        // Limpa os elementos previamente adicionados, se necessário
        container.innerHTML = '';
    }
    
    clone.classList.add('event__totalizers--participants');

    document.getElementById('prices').appendChild(clone);
    document.getElementById('order-resume-price').appendChild(clone);
}

// Função para pegar os dados de todos os formulários
function pegarDadosFormularios() {
    const container = document.getElementById('accordion');
    const formulários = container.querySelectorAll('form');
    const dadosArray = [];

    formulários.forEach((form) => {
        const dadosFormulario = {};

        // Pega todos os campos de input dentro do formulário
        const campos = form.querySelectorAll('input, select, textarea');

        campos.forEach((campo) => {
            if (campo.name) {
                dadosFormulario[campo.name] = campo.value; // Adiciona o valor do campo ao objeto
            }
        });

        dadosArray.push(dadosFormulario); // Adiciona o objeto de dados do formulário ao array
    });

    console.log(dadosArray); // Exibe os dados no console (pode ser manipulado conforme necessário)
    return dadosArray;
}