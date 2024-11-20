// const urlApi = ',';
const urlApi = 'http://localhost:8000';

export async function auth() {

  const { data } = await axios.post(`${urlApi}/usuarios/auth`,
    {
      // username: ',',
      // password: ','
      username: 'PradosAdmin',
      password: '1234'
    }
  )

  document.cookie = `token=${data.token}`
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

  const { data } = await axios.get(`${urlApi}/excursao/findAll`, {
    headers: {
      'Authorization': token
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

export async function login() {

  const { data } = await axios.get(`${urlApi}/usuarios/login`)

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
