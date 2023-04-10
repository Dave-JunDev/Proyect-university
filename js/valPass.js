const pswd1 = document.getElementById("pswd1");
const pswd2 = document.getElementById("pswd2");

const email1 = document.getElementById("email1"); 
const email2 = document.getElementById("email2"); 

const ok = document.getElementById("Ok");
const error = document.getElementById("Error");

const okC = document.getElementById("OkC");
const errorC = document.getElementById("ErrorC");

const regis = document.getElementById("registrar");


pswd2.addEventListener("input", () => {
    if (pswd1.value === pswd2.value) {
        error.classList.remove("mostrar");
        ok.classList.add("mostrar");
        
        regis.disabled = false;
        
    } else {
        error.classList.add("mostrar")
        ok.classList.remove("mostrar");
        
         regis.disabled = true;
    }
});

pswd1.addEventListener("input", () => {
    if (pswd1.value === pswd2.value) {
        error.classList.remove("mostrar");
        ok.classList.add("mostrar");
        
        regis.disabled = false;
    } else {
        error.classList.add("mostrar")
        ok.classList.remove("mostrar");
        
        regis.disabled = true;
    }
});


email1.addEventListener("input", () => {
    if (email1.value === email2.value) {
        errorC.classList.remove("mostrar");
        okC.classList.add("mostrar");
        
        regis.disabled = false;
    } else {
        errorC.classList.add("mostrar")
        okC.classList.remove("mostrar");
        
        regis.disabled = true;
    }
});

email2.addEventListener("input", () => {
    if (email1.value === email2.value) {
        errorC.classList.remove("mostrar");
        okC.classList.add("mostrar");
        
        regis.disabled = false;
        
    } else {
        errorC.classList.add("mostrar")
        okC.classList.remove("mostrar");
        
        regis.disabled = true;
    }
});
