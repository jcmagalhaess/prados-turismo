// const urlApi = 'http://localhost:8000';
const urlApi = 'https://78eb-189-106-167-112.ngrok-free.app';

export async function auth() {

  const { data } = await axios.post(`${urlApi}/usuarios/auth`,
    {
      // username: 'PradosAdmin',
      // password: '1234'
      username: 'PradosAdmin',
      password: '1234'
    }
  )

  localStorage.setItem('token', data.token)
}

export function getCookie(name) {
  let cookieArr = document.cookie.split(';');
  for (let i = 0; i < cookieArr.length; i++) {
    let cookie = cookieArr[i].trim();
    if (cookie.indexOf(name + "=") === 0) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}

export async function findExcursion(id) {

  const { data } = await axios.get(`${urlApi}/excursao/find/${id}`, {
    headers: {
      'Authorization': token
    }
  })

  return data
}

export async function findAllExcursions() {

  const { data } = await axios.get(`${urlApi}/excursao/index`, {
    headers: {
      'Authorization': token
    },
    params: {
      publicado: 1
    }
  })

  return data
}

export async function findDestinyByOrigin(origin) {

  const { data } = await axios.get(`${urlApi}/excursao/index`, {
    headers: {
      'Authorization': token
    },
    params: {
      origem: origin
    }
  })

  return data
}

export async function login(username, password) {

  const { data } = await axios.post(`${urlApi}/usuarios/login-user-client`, {
    username,
    password
  })

  return data
}

export async function transaction(postData) {

  const { data } = await axios.post(`${urlApi}/financeirio/create`, postData, {
    headers: {
      'Authorization': token
    }
  })

  return data
}

export async function findAllPaymentMethods() {

  const { data } = await axios.get(`${urlApi}/forma-pagamento/findAll`, {
    headers: {
      'Authorization': token
    }
  })

  return data
}

export async function customerCredit(id) {

  const { data } = await axios.get(`${urlApi}/credito-cliente/find/${id}`, {
    headers: {
      'Authorization': token
    }
  })

  return data
}

export async function cart(customerId) {

}

export async function registerClient(username) {

  const data = await axios.post(`${urlApi}/usuarios/register-user-client`,
    { email: username },
    {
      headers: {
        'Authorization': token
      }
    }).catch((err) => {
      console.log(err)
    })

  return data
}
