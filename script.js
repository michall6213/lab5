console.log("Skrypt działa");

const form = document.getElementById("contactForm");
const imie = document.getElementById("imie");
const email = document.getElementById("email");
const wiadomosc = document.getElementById("wiadomosc");
const zgoda = document.getElementById("zgoda");
const licznik = document.getElementById("licznik");
const powitanie = document.getElementById("powitanie");

document.getElementById("testName").addEventListener("click", function () {
    const name = imie.value.trim();

    if (name === "") {
        powitanie.textContent = "Wpisz najpierw imię.";
    } else {
        powitanie.textContent = "Witaj, " + name + "!";
    }
});

wiadomosc.addEventListener("input", function () {
    const left = 200 - wiadomosc.value.length;
    licznik.textContent = "Pozostało " + left + " znaków.";
});

form.addEventListener("submit", function (event) {
    let errors = [];

    document.getElementById("imieError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("wiadomoscError").textContent = "";
    document.getElementById("zgodaError").textContent = "";
    document.getElementById("formErrors").textContent = "";

    const name = imie.value.trim();
    const message = wiadomosc.value.trim();

    if (name === "") {
        errors.push("Wpisz imię.");
        document.getElementById("imieError").textContent = "To pole jest wymagane.";
    } else if (name.length < 2) {
        errors.push("Imię musi mieć co najmniej 2 znaki.");
        document.getElementById("imieError").textContent = "Wpisz co najmniej 2 znaki.";
    }

    if (!email.checkValidity()) {
        errors.push("Wpisz poprawny adres e-mail.");
        document.getElementById("emailError").textContent = "Wpisz poprawny adres e-mail.";
    }

    if (message === "") {
        errors.push("Wpisz wiadomość.");
        document.getElementById("wiadomoscError").textContent = "To pole jest wymagane.";
    }

    if (!zgoda.checked) {
        errors.push("Musisz zaakceptować regulamin.");
        document.getElementById("zgodaError").textContent = "Zaznacz zgodę.";
    }

    if (errors.length > 0) {
        event.preventDefault();
        document.getElementById("formErrors").textContent = errors.join(" ");
    }
});

form.addEventListener("reset", function () {
    powitanie.textContent = "";
    licznik.textContent = "Pozostało 200 znaków.";
    document.querySelectorAll(".error").forEach(function (element) {
        element.textContent = "";
    });
});
