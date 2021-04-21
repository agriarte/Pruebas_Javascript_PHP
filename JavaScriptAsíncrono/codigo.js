const DATOS = [
    {   id:'123',
        fecha: '12/05/2021'},
     {   id:'123',
        fecha: '12/05/2021'},
     {   id:'123',
        fecha: '12/05/2021'}
    ];

const miFuncion1 = () => {
    return "hola"
};
/*
const getDatosAsincrono = () => {
    setTimeout(() =>{
        return DATOS;
    },1500);
};*/

//da error UNDEFINED porque el programa ya está cerrado cuando pasa el tiempo y
//los datos se han borrado. Se soluciona usando promesas
const getDatosAsincrono = () => {
    setTimeout(() =>{
        return DATOS;
      
    },1500);
};

const getDatosPromesa = () =>{
    return new Promise((resolve,reject)=>{
        if (DATOS.length === 0 ){
            reject( new Error('No hay Datos'));
        } else {
            setTimeout(() => {
                resolve(DATOS);
            },1500); 
        }
    });
};

console.log (miFuncion1());
//dará error Undefined
//console.log (getDatosAsincrono());
console.log (getDatosPromesa());
