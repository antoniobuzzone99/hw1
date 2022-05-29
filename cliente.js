
const form = document.querySelector("#form");
form.querySelector("#cerca").addEventListener("click", cerca);
form.querySelector("#preferiti").addEventListener("click", preferiti);

form.addEventListener("submit", checkSubmit);

let contenuto;


function onResponse(response) {
  console.log("Risposta ricevuta");
  return response.json();
}


//GENERAZIONE POST
function onJson(json) {
  
    document.querySelector("#sub1").classList.remove('hidden');
    document.querySelector("#sub2").classList.remove('hidden');

    console.log(json);
    const immagine = document.querySelector("#risposta");
    immagine.innerHTML = "";
    const img = document.createElement("img");
    img.classList.add('risultato');
    img.src = json.data[Math.round(Math.random() * 20)].logos.dark;
    immagine.appendChild(img);
    contenuto = img.src;
    console.log(contenuto);
}

function cerca(event) {
  event.preventDefault();
  fetch("fetch_logo.php").then(onResponse).then(onJson);
}

//CARICAMENTO
function checkSubmit(event) {
  let descr = form.querySelector('#descr').value;
  if (contenuto !== undefined){
    fetch("caricamento_logo.php?logo="+encodeURIComponent(contenuto)+"&descrizione="+encodeURIComponent(descr));
    event.preventDefault();
    window.location.reload();
  }
}


function jsonPreferiti(json){
  const res = document.querySelector('#risposta1');
  console.log(json);
  
  for(let i of json){

    const us = document.createElement('div');
    us.classList.add('use');
    us.textContent = i.username;


    const box2 = document.createElement('div');
    box2.classList.add('box2');

    const descr = document.createElement('div');
    descr.classList.add('descr');
    descr.innerText = i.content.descrizione;

    const img = document.createElement("img");
    img.classList.add('post1');
    img.src = i.content.url;

    box2.appendChild(us);
    box2.appendChild(descr);
    box2.appendChild(img);
    res.appendChild(box2);
  }
} 


function preferiti(event){
  event.preventDefault();
  fetch("stampa_post_preferiti.php").then(onResponse).then(jsonPreferiti);
}

