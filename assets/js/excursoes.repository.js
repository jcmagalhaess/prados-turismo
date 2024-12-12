const urlApi = 'http://localhost:8000';

export async function buscarPacotes(size = 6, page = 1, origem, order = 'asc', orderBy = 'dataInicio') {
    try {
        const response = await axios.get(`${urlApi}/excursao/index?${new URLSearchParams(removeNulls({ size, page, origem, order, orderBy }))}`, {
            headers: {
                'Authorization': localStorage.getItem('token'),
            },
        })

        await axios.post(`./views/api/excursoes.repository.php`, response.data.rows.map(excursion => excursoesMapper(excursion)));
    } catch (error) {
        console.error('Erro ao enviar dados para o PHP:', error);
    }   
}

export async function buscarPacoteById(id) {
    try {
        // Requisição GET para buscar o pacote
        const response = await axios.get(`${urlApi}/excursao/find/${id}`, {
            headers: {
                'Authorization': localStorage.getItem('token'),
                'Content-Type': 'application/json'
            },
        });

        // O `axios` já processa o JSON automaticamente
        const data = response.data;

        // Atualizar o DOM se os dados forem válidos
        if (data) {
            await atualizarDom(data); // Atualiza o DOM com os dados recebidos
            await enviarDadosParaPHP(data, id);
        }
    } catch (error) {
        console.error('Erro ao buscar pacote:', error);
    }
}

async function atualizarDom(data) {
    const container = document.getElementById('excursao-loading');

    // Limpa o conteúdo do container
    container.innerHTML = '';

    const excursao = excursoesMapper(data);
    
    document.getElementById('event-title').innerText = excursao.nome;
    document.getElementById('event-price').innerText = `${excursao.valorFormatado} / por pessoa`;
    document.getElementById('event-description').innerText = formatandoDescricao(excursao.observacoes);
    document.getElementById('event-destination').innerText = excursao.Pacotes.nome;
    document.getElementById('event-included').innerHTML = formatandoItensInclusos(excursao.observacoes);

    if (excursao.Pacotes.Galeria.length === 0) {
        document.getElementById('event-gallery').style.display = 'none';
    } else {
        document.getElementById('event-gallery').style.display = 'block';
    }

    document.getElementById('event-gallery-description').innerHTML = excursao.Pacotes.descricao;

    excursao.Pacotes.Galeria.forEach(item => {
        document.getElementById('event-gallery-list').innerHTML += `
            <li class="event__item" style="background-image: url(${ item.url })">
                <a href="${ item.url }" data-lightbox="roadtrip" data-title="${ item.nome }"></a>
            </li>`;
    });

    const dataInicio = new Date(excursao.dataInicio);
    const dataFim = new Date(excursao.dataFim);

    formatarData(dataInicio);
    formatarData(dataFim);
    
    document.getElementById('period-event').innerHTML += `<option value="${ formatarData(dataInicio) } a ${ formatarData(dataFim) }">${ formatarData(dataInicio) } a ${ formatarData(dataFim) }</option>`
}

function formatarData(data) {
    const dia = data.getDate().toString().padStart(2, '0');
    const mes = (data.getMonth() + 1).toString().padStart(2, '0');
    const ano = data.getFullYear();

    return `${dia}/${mes}/${ano}`;
}

async function enviarDadosParaPHP(data, id) {
    try {
        // Enviar os dados processados para o PHP
        const response = await axios.post(
            `./views/api/excursoes-detalhes.repository.php?id=${id}`,
            excursoesMapper(data) //Mapeia os dados antes de enviar
        );
        console.log('Dados enviados com sucesso para o PHP:', excursoesMapper(data));
    } catch (error) {
        console.error('Erro ao enviar dados para o PHP:', error);
    }
}

function calcularDiasENoites(dataInicio, dataFim) {
    // Converte as strings de data para objetos Date
    const inicio = new Date(dataInicio);
    const fim = new Date(dataFim);

    // Calcula a diferença em milissegundos
    const diffEmMilissegundos = fim - inicio;

    // Converte a diferença para dias
    const dias = Math.ceil(diffEmMilissegundos / (1000 * 60 * 60 * 24)) + 1; // Incluindo o dia inicial

    // As noites são uma unidade a menos que os dias
    const noites = dias - 1;

    // Retorna o formato "X dias e Y noites"
    return `${dias} dias e ${noites} noites`;
}

function excursoesMapper(excursoes) {
    return {
        ...excursoes,
        duracao: calcularDiasENoites(excursoes.dataInicio, excursoes.dataFim),
        valorFormatado: new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(excursoes.valor),
        Pacotes: {
            ...excursoes.Pacotes,
            category: Origem[excursoes.Pacotes.origem]
        }
    };
}

const Origem = Object.freeze({
    1: 'Fortaleza',
    2: 'Tianguá'
})

function removeNulls(obj) {
    return Object.fromEntries(
        Object.entries(obj).filter(([key, value]) => value !== null && value !== undefined)
    );
}

function formatandoDescricao(description) {
    let splitDescription = description.split('---');

    if (splitDescription[0].includes(';')) {
        return '';
    }

    return splitDescription[0];
}

function formatandoItensInclusos(description) {
    let splitDescription = description.split('---');

    if (splitDescription[0].includes(';')) {
        return buildItensInclusos(splitDescription[0].split(';'));
    }

    return buildItensInclusos(splitDescription[1].split(';'));
}

function buildItensInclusos(itens) {
    let itensFilted = itens.filter(item => item !== '');
    
    let structure = `<ul class="d-flex flex-wrap">`;

    if (itensFilted.length) {
        itensFilted.forEach(element => {
            structure += `<li><i class="fa-solid fa-check text-success me-3"></i>${ element }</li>`;
        });
    }

    structure += `</ul>`;

    return structure;
}