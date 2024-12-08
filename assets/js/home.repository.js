const urlApi = 'http://localhost:8000';

export async function buscarPacotes(size = 6, page = 1, origem, order = 'asc', orderBy = 'dataInicio') {
    try {
        const response = await axios.get(`${urlApi}/excursao/index?${new URLSearchParams(removeNulls({ size, page, origem, order, orderBy }))}`, {
            headers: {
                'Authorization': localStorage.getItem('token'),
            },
        })

        await axios.post(`./views/api/excursoes.repository.php`, excursoesMapper(response.data.rows));
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
    return excursoes.map((excursion) => ({
        ...excursion,
        duracao: calcularDiasENoites(excursion.dataInicio, excursion.dataFim),
        valorFormatado: new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(excursion.valor),
        Pacotes: {
            ...excursion.Pacotes,
            category: Origem[excursion.Pacotes.origem]
        }
    }))
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