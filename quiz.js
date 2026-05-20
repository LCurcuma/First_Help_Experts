//

let myQuestions = [];
let currentQuestionIndex = 0;
let score = 0;

//Henter HTML-elementer ind i variabler
const quizScreen = document.getElementById("quiz-screen");
const resultScreen = document.getElementById("result-screen");
const questionText = document.getElementById("question-text");
const quizImage = document.getElementById("quiz-image");
const optionsContainer = document.getElementById("options-container");
const progressText = document.getElementById("progress-text");
const progressBar = document.getElementById("progress-bar");
const correctScoreText = document.getElementById("correct-score");
const totalQuestionsText = document.getElementById("total-questions");

//Henter data fra JSON fil
function fetchQuestions() {
    fetch('quiz.json')
        .then(response =>{
            if (!response.ok) {
                throw new Error("Kunne ikke hente data fra JSON-fil");
            }
            return response.json();
        })
        .then(data => {
            myQuestions = data;
            loadQuestions();
        })
        .catch(error => {
            console.error("Der opstod en fejl", error);
            questionText.innerText = "Hov! Kunne ikke indlæse spørgsmålene";
        })
}

//Funktion der bygger spørgsmålene
function loadQuestions() {
    const currentQuestion = myQuestions[currentQuestionIndex];

    questionText.innerText = currentQuestion.question;
    quizImage.src = currentQuestion.image;
    progressText.innerText = `Spørgsmål ${currentQuestionIndex + 1} af ${myQuestions.length}`;

    const progressPercent = ((currentQuestionIndex + 1) / myQuestions.length) * 100;
    progressBar.style.width = `${progressPercent}%`;

    optionsContainer.innerHTML = "";

    const letters = ["A", "B", "C", "D"];

    currentQuestion.answers.forEach((answer, index) => {
        const button = document.createElement("button");

        button.className = "answer-option w-100 mb-3 text-start d-flex align-items-center gap-3 p-3";
        button.innerHTML = `<div class="letter-badge">${letters[index]}</div> <span class="fw-semibold text-dark fs-6">${answer}</span>`;

        button.addEventListener("click", () => checkAnswer(index, button));
        optionsContainer.appendChild(button);
    });
}

//Funktion der tjekker svaret
    function checkAnswer(selectedIndex, clickedButton) {
        const currentQuestion = myQuestions[currentQuestionIndex];
        optionsContainer.classList.add("disable-clicks");

        if (selectedIndex === currentQuestion.correctAnswer) {
            clickedButton.classList.add("correct-choice");
            score++;
        } else {
            clickedButton.classList.add("wrong-choice");
            const allButtons = optionsContainer.children;
            allButtons[currentQuestion.correctAnswer].classList.add("correct-choice");
        }

        // Vent 1,5 sekund (1500ms) så farverne kan ses, før vi skifter
        setTimeout(() => {
            currentQuestionIndex++;
            optionsContainer.classList.remove("disable-clicks");

            if (currentQuestionIndex < myQuestions.length) {
                loadQuestions();
            } else {
                showResults();
            }
        }, 1500);
    }

// Funktion der viser den endelige resultat-skærm
    function showResults() {
        quizScreen.classList.add("d-none");
        resultScreen.classList.remove("d-none");
        correctScoreText.innerText = score;
        totalQuestionsText.innerText = myQuestions.length;
    }

// EVENT LISTENER: Kører så snart HTML-strukturen er helt indlæst i browseren
document.addEventListener('DOMContentLoaded', () => {
    fetchQuestions();
});

