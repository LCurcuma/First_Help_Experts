//Valg af et tilfældigt motiverende tekst til forside.php

//Liste med de forskellige tekster
const motivationTexts = [
    "Klar til at redde liv i dag?",
    "Førstehjælp starter med dig",
    "Små handlinger kan redde store liv",
    "Hjælp kan starte med dine hænder.",
    "Tryghed starter med viden."
];

//Finder elementet med id "motivationalText"
const textElement = document.getElementById("motivationalText");

// Generer et tilfældigt tal baseret på hvor mange tekster der er i listen
const randomIndex = Math.floor(Math.random() * motivationTexts.length);

//Skifter teksten med det samme til den tilfældige udvalgte tekst fra listen
textElement.textContent = motivationTexts[randomIndex];