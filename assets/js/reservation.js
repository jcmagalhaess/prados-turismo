function createReservation(price) {
    let reservation = {};

    reservation.period = document.getElementById('period-event').value;
    reservation.people = [
        { key: 'adults', value: Number(document.getElementById('input-adults-count').value) },
        { key: 'children', value: Number(document.getElementById('input-children-count').value) },
        { key: 'babies', value: Number(document.getElementById('input-babies-count').value) }
    ];

    reservation.tickets = reservation.people.map(person => person.value).reduce((a, b) => a + b);
    reservation.price = price;

    sessionStorage.setItem('reservation', JSON.stringify(reservation)); 

    createParticipants(reservation.tickets);
}

function createParticipants(amount) {
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