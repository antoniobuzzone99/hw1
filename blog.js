//STAMPA DEL POST
function onResponse(response) {
    console.log(response);
    return response.json();
}

function jsonCheckPost(json){
    const res = document.querySelector('#risposta2');
    console.log(json);
    
        for(let i of json){

            const box1 = document.createElement('div');
            box1.classList.add('box1');

            const us = document.createElement('div');
            us.classList.add('use');
            us.textContent = i.username;

            const descr = document.createElement('div');
            descr.classList.add('descr');
            descr.innerText = i.content.descrizione;

            const img = document.createElement("img");
            img.classList.add('post');
            img.src = i.content.url;

            const box2 = document.createElement('div');
            box2.classList.add('box2');

            const li = document.createElement('img');
            li.dataset.idpost1 = i.id_post;
            li.classList.add('like');

            const num = document.createElement("span");
            num.classList.add('numero');
            num.dataset.idpost2 = i.id_post;

            const pref = document.createElement('img');
            pref.dataset.idpost3 =i.id_post;
            pref.classList.add('preferiti');
            
            //VERIFICO IL LIKE
            if (i.verifica == true){
                li.src = 'img/like_rosso.png';
                li.dataset.verificaLike = 1;
                num.textContent = i.nlikes;
                box2.appendChild(li);
                box2.appendChild(num);
                li.addEventListener("click", like_post);
            }else{
                li.src = 'img/like_vuoto.png';
                li.dataset.verificaLike = 0;
                num.textContent = i.nlikes;
                box2.appendChild(li);
                box2.appendChild(num);
                li.addEventListener("click", like_post);
            }

            //VERIFICO I PREFERITI
            if(i.preferiti == true){
                pref.src = 'img/pref_pieno.png';
                pref.dataset.verificaPref = 1;
                box2.appendChild(pref);
                pref.addEventListener("click", preferiti_post);
            }else{
                pref.src = 'img/pref_vuoto.png';
                pref.dataset.verificaPref = 0;
                box2.appendChild(pref); 
                pref.addEventListener("click", preferiti_post);
            } 
            

            box1.appendChild(us);
            box1.appendChild(descr);
            box1.appendChild(img);
            box1.appendChild(box2);
            res.appendChild(box1);
        }
    
} 

function json_num(json){
    console.log(json);

  
        if (json.var === true){
            span = document.querySelectorAll('span');
            for (i of span.values()){
                console.log(i.dataset);
                if (i.dataset.idpost2 == json.id_post){
                    i.textContent = json.likes;
                }
            }
    
        }else {
            span = document.querySelectorAll('span');
            for (i of span.values()){
                console.log(i.dataset); 
                if (i.dataset.idpost2 == json.id_post){
                    i.textContent = json.likes;
                }
            }
        }
    
}

function like_post(event){
    const like = event.currentTarget;
    const id_post = like.dataset.idpost1;

    if (like.dataset.verificaLike == 1){
        like.src = 'img/like_vuoto.png';
        fetch("unlike_post.php?post_id="+encodeURIComponent(id_post)).then(onResponse).then(json_num);
        like.dataset.verificaLike = 0;
    }else{
        like.src = 'img/like_rosso.png';
        fetch("like_post.php?post_id="+encodeURIComponent(id_post)).then(onResponse).then(json_num);
        like.dataset.verificaLike = 1;
    }
}


function preferiti_post(event){
    const pref= event.currentTarget;
    const id_post = pref.dataset.idpost3;

    if (pref.dataset.verificaPref == 1){
        pref.src = 'img/pref_vuoto.png';
        fetch("togliPref_post.php?post_id="+encodeURIComponent(id_post));
        pref.dataset.verificaPref = 0;
    }else{
        pref.src = 'img/pref_pieno.png';
        fetch("aggPref_post.php?post_id="+encodeURIComponent(id_post));
        pref.dataset.verificaPref = 1;
    }
}

fetch("stampa_post.php").then(onResponse).then(jsonCheckPost);

