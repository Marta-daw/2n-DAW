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
