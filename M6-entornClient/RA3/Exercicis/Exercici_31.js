//31
//local storage -> la informació que introdueixo a un formulari es guarda a un local storage i si o clicko a f5 dons se'm manté la informació introduida
//Exemple -> window.localStorrage.setItem("myCat", "Tom")
//Per llegir -> const cat=localStorage.getItem("myCat")
//Per eliminar -> localStorage.removeItem("myCat")

const myObj = {name: "Marta", age: 33, city:"Mataró"};

const myJson=JSON.stringify(myObj);

localStorage.setItem('myObj', myJson);

const recuperada= JSON.parse(localStorage.getItem('myObj'))

console.log(recuperada)

//-----------------------------------------------------------------------
const doc=document.getElementById("document");

function init(){
    crearFormulari();
    creaBotons();
}

function crearFormulari(){
    let div=document.querySelector("#div1");

    const pNom=document.createElement("p");
    pNom.id="pNom";
    pNom.innerHTML="Nom:";
    pNom.style.color='blue';
    pNom.style.marginBottom='5px';

    const inputName=document.createElement("input");
    inputName.type='text';
    inputName.className='nom';
    inputName.id='nom';
    inputName.required='required';
    inputName.style.borderRadius="5px";
    inputName.style.padding="10px";
    inputName.style.width= "300px";

    const pCognom=document.createElement("p");
    pCognom.id="pCognom";
    pCognom.innerHTML="Cognom:";
    pCognom.style.color='blue';
    pCognom.style.marginBottom='5px';
    
    const inputSurname=document.createElement("input");
    inputSurname.type='text';
    inputSurname.className='Cognom';
    inputSurname.id='Cognom';
    inputSurname.style.borderRadius="5px";
    inputSurname.style.padding="10px";
    inputSurname.style.width= "300px";

    const pEmail=document.createElement("p");
    pEmail.id="pEmail";
    pEmail.innerHTML="E-mail:";
    pEmail.style.color='blue';
    pEmail.style.marginBottom='5px';

    const inputMail=document.createElement("input");
    inputMail.type='text';
    inputMail.className='mail';
    inputMail.id='mail';
    inputMail.required='required';
    inputMail.style.borderRadius="5px";
    inputMail.style.padding="10px";
    inputMail.style.width= "300px";

    const pAdreca=document.createElement("p");
    pAdreca.id="pAdreca";
    pAdreca.innerHTML="Adreça:";
    pAdreca.style.color='blue';
    pAdreca.style.marginBottom='5px';

    const inputAdress=document.createElement("input");
    inputAdress.type='text';
    inputAdress.className='adreca';
    inputAdress.id='adreca';
    inputAdress.style.borderRadius="5px";
    inputAdress.style.padding="10px";
    inputAdress.style.width= "300px";

    div.append(pNom, inputName, pCognom, inputSurname, pEmail, inputMail, pAdreca, inputAdress);
    doc.insertAdjacentElement("beforeend", div);
}

function creaBotons(){
    let div=document.querySelector("#div1");
    
    const botoEnvia= document.createElement("button");
    botoEnvia.type='submit';
    botoEnvia.className='envia';
    botoEnvia.id='envia';
    botoEnvia.innerHTML='Envia';
    botoEnvia.style.marginTop="20px";
    botoEnvia.style.marginRight="20px";
    botoEnvia.style.paddingLeft="10px";
    botoEnvia.style.paddingRight="10px";

    const botoReset= document.createElement("button");
    botoReset.type='submit';
    botoReset.className='reset';
    botoReset.id='reset';
    botoReset.innerHTML='Reseteja';
    botoReset.style.paddingLeft="10px";
    botoReset.style.paddingRight="10px";

    div.append(document.createElement("br"),botoEnvia, botoReset);
}