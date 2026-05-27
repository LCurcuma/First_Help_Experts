//Liste med de forskellige tekster
const motivationTexts = [
    "Klar til at redde liv i dag?",
    "Førstehjælp starter med dig",
    "Små handlinger kan redde store liv",
    "Hjælp kan starte med dine hænder.",
    "Tryghed starter med viden."
];

// Finder ALLE elementer med classen "motivational-text-js" (både mobil og desktop)
const textElements = document.querySelectorAll(".motivational-text-js");

// Generer et tilfældigt tal baseret på hvor mange tekster der er i listen
const randomIndex = Math.floor(Math.random() * motivationTexts.length);

// Kører igennem alle fundne elementer og skifter teksten på dem alle
textElements.forEach(function(element) {
    element.textContent = motivationTexts[randomIndex];
});