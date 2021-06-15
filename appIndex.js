const logowanieButt = document.getElementById('log');
const rejsetracjaButt = document.getElementById('rej');

const logowanie = document.getElementById('logowanie');
const rejsetracja = document.getElementById('rejestracja');

const pokazRejestracje = ()=> {
    logowanie.classList.remove("widnoczny");
    logowanie.classList.add("niewidzocz");
    rejsetracja.classList.remove('niewidzocz');
    rejsetracja.classList.add('widnoczny');
}
const pokazLogowanie = ()=> {
    logowanie.classList.add("widnoczny");
    logowanie.classList.remove("niewidzocz");
    rejsetracja.classList.add('niewidzocz');
    rejsetracja.classList.remove('widnoczny');
}   


rejsetracjaButt.addEventListener('click', pokazRejestracje);
logowanieButt.addEventListener('click', pokazLogowanie);