const urlApi = 'http://localhost:8000';

function buscarPacotes() {
    return axios.get(`${urlApi}/pacotes/findAll`, {
        headers: {
            'Authorization': localStorage.getItem('token')
        },
    })
}