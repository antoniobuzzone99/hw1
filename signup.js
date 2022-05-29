
const errors = [];
for(let i=0; i<7; i++){
  errors[i] = 0;
}
//setto ad 1 quando i campi sono pieni o non sono sbaglaiti

function fetchResponse(response){
  return response.json();
}

function checkNome(event){
  const input = document.querySelector('.nome input');
  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.nome').parentNode.querySelector('.errore').remove();
  }

  if(input.value.length === 0){
    const error = "inserire un nome";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[0] = 0;
  }else{
    errors[0] = 1;
  }
}

function checkCognome(event){
  const input = document.querySelector('.cognome input');
  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.cognome').parentNode.querySelector('.errore').remove();
  }

  if(input.value.length === 0){
    const error = "inserire un cognome";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[1] = 0;
  }else{
    errors[1] = 1;
  }
}

function jsonCheckUsername(json) {
  console.log(json);
  // Controllo il campo exists ritornato dal JSON
  const input = form.querySelector('.username input');
  //se username presente
  if(json){
    const error = "username già utilizzato";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[2] = 0;
  }
  else{
    //setto ad 1 in quanto la condizione è verificata, dove settare quando non c'è json?
    errors[2] = 1;
    if(input.parentNode.parentNode.querySelector('.errore') !== null){
      //non posso selezionare direttamente box1 in quanto elimino tutti gli errori anche quello degli altri campi
      //in quanto box1 si chiama il campo email, ecc...
      document.querySelector('.username').parentNode.querySelector('.errore').remove();
    }
  }
  
}

function checkUsername(event) {
  const input = document.querySelector('.username input');

  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.username').parentNode.querySelector('.errore').remove();
  }

  if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
    const error = "inserire un username valido";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[2] = 0;
  }else{
    fetch("checkusername.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
  }
}

function checkData(event){
  const input = document.querySelector('.data input');
  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.data').parentNode.querySelector('.errore').remove();
  }
  let now = new Date(); 
  let today = now.toISOString(); 
  if (input.value > today.slice(0, 10)){ 
    const error = "inserire un data valida";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
  errors[3] = 0;
  }else{
    errors[3] = 1;
  }
}

function jsonCheckEmail(json){
  const input = form.querySelector('.email input');
  if(json){
    const error = "email già utilizzata";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[4] = 0;
  }else{
    errors[4] = 1;
    if(input.parentNode.parentNode.querySelector('.errore') !== null){
      document.querySelector('.username').parentNode.querySelector('.errore').remove();
    }
  }
}

function checkEmail(event){
  const input = document.querySelector('.email input');

  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.email').parentNode.querySelector('.errore').remove();
  }

  if(input.value.length === 0){
    const error = "inserire una email";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[4] = 0;
  }else if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
    const error = "inserire una email valida";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[4] = 0;
  }
  else{
    fetch("checkemail.php?q="+encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
  }

}

function checkPassword(event){
  input = document.querySelector('.password input');

  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.password').parentNode.querySelector('.errore').remove();
  }

  if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&-\*])(?=.{8,25})/.test(input.value)){
    const error = "inserire un password valida";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[5] = 0;
  }
  else{
    errors[5] = 1
  }
}

function checkC_Password(event){
  input = document.querySelector('.conferma_password input');

  if(input.parentNode.parentNode.querySelector('.errore') !== null){
    document.querySelector('.conferma_password').parentNode.querySelector('.errore').remove();
  }

  if(input.value.length === 0){
    const error = "inserire un password";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[6] = 0;
  }else if(input.value !== document.querySelector('.password input').value){
    const error = "password diverse";
    const element = document.createElement('div');
    element.textContent = error;
    element.classList.add('errore');
    if(input.parentNode.parentNode.querySelector('.errore') === null){
      input.parentNode.parentNode.appendChild(element);
    }
    errors[6] = 0;
  }
  else{
    errors[6] = 1;
  }
}


function checkSubmit(event){
  if(errors[0] === 0 || errors[1] === 0 || errors[2] === 0 || errors[3] === 0 || errors[4] === 0 || errors[5] === 0 || errors[6] === 0){
    event.preventDefault();
    const error = "compilare tutti i campi";
    const element = document.createElement('div');
    element.innerText = error;
    element.classList.add('errore');
    if(form.querySelector('.submit').parentNode.querySelector('.errore') === null){ 
      form.querySelector('.submit').parentNode.appendChild(element);
    }
  }
}

const form = document.querySelector('#form'); 

form.querySelector(".nome input").addEventListener('blur',checkNome);
form.querySelector(".cognome input").addEventListener('blur',checkCognome);
form.querySelector(".username input").addEventListener('blur',checkUsername);
form.querySelector(".data input").addEventListener('blur',checkData);
form.querySelector(".email input").addEventListener('blur',checkEmail);
form.querySelector(".password input").addEventListener('blur',checkPassword);
form.querySelector(".conferma_password input").addEventListener('blur',checkC_Password);
form.addEventListener("submit",checkSubmit);