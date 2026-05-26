//Finder "Dagens mission" cardet (det er det 3. kort i rækken, derfor [2])
var dailyMissionCard = document.querySelectorAll('.fp-action-card')[2];

//Finder ikonet inde i cardet, så vi kan skifte det senere
var dailyMissionIcon = dailyMissionCard.querySelector('.fp-card-icon');

//Finder modal og modal-elementer i HTML
var modalElement = document.getElementById('dailyMissionModal');
var dailyModal = new bootstrap.Modal(modalElement);
var questionText = document.getElementById('missionQuestionText');
var optionsContainer = document.getElementById('missionOptionsContainer');
var pointsForm = document.getElementById('pointsForm');

//Funktion der tjekker om man har svaret inden for de sidste 24 timer
function hasCooldown() {

    //Henter tidspunktet fra localStorage
    var lastAnswered = localStorage.getItem('dailyMissionTime');

    //Hvis man har svaret før
    if (lastAnswered) {

        //Finder nuværende tidspunkt
        var now = new Date().getTime();

        //Regner forskellen mellem nu og sidste svar
        var timeDiff = now - parseInt(lastAnswered);

        //24 timer i millisekunder (24 * 60 * 60 * 1000)
        var twentyFourHours = 86400000;

        //Tjekker om der er gået mindre end 24 timer
        if (timeDiff < twentyFourHours) {
            return true;
        }
    }

    //Man må gerne svare
    return false;
}

//Skifter ikon hvis missionen allerede er klaret
if (hasCooldown()) {

    //Henter status fra localStorage
    var missionStatus = localStorage.getItem('dailyMissionStatus');

    //Tjekker om brugeren svarede forkert
    if (missionStatus === 'wrong') {

        //Viser forkert ikon
        dailyMissionIcon.src = "img/icons/3d-icons/wrong.png";

    } else {

        //Viser checkmark ikon
        dailyMissionIcon.src = "img/icons/3d-icons/checkmark2.png";
    }
}

//Lytter efter klik på "Dagens mission" cardet
dailyMissionCard.addEventListener('click', function(event) {

    //Stopper linket i at hoppe op i toppen af siden
    event.preventDefault();

    //Tjekker om brugeren har cooldown
    if (hasCooldown()) {

        //Viser besked om at brugeren skal vente
        questionText.innerHTML = "Kom tilbage om 24 timer!";

        //Fjerner alle knapper
        optionsContainer.innerHTML = "";

        //Viser modalen
        dailyModal.show();

    } else {

        //Henter spørgsmål fra JSON filen
        fetch('data/data_daily_mission.json')

            //Konverterer svar til JSON
            .then(function(response) {
                return response.json();
            })

            //Når data er hentet
            .then(function(data) {

                //Vælger et tilfældigt spørgsmål
                var randomIndex = Math.floor(Math.random() * data.length);

                //Gemmer det tilfældige spørgsmål
                var randomQuestion = data[randomIndex];

                //Sætter spørgsmålet ind i modalen
                questionText.innerHTML = randomQuestion.question;

                //Tømmer gamle knapper
                optionsContainer.innerHTML = "";

                //Kører igennem alle svarmuligheder
                for (var i = 0; i < randomQuestion.options.length; i++) {

                    //Gemmer nuværende svarmulighed
                    var option = randomQuestion.options[i];

                    //Opretter en ny knap
                    var btn = document.createElement('button');

                    //Giver knappen Bootstrap classes
                    btn.className = "btn bg-white border p-3 rounded-4 text-dark fw-medium shadow-sm";

                    //Sætter tekst på knappen
                    btn.innerHTML = option.text;

                    //Gemmer om svaret er korrekt
                    btn.dataset.correct = option.correct;

                    //Lytter efter klik på knappen
                    btn.addEventListener('click', function() {

                        //Finder nuværende tidspunkt
                        var nu = new Date().getTime();

                        //Gemmer tidspunktet i localStorage
                        localStorage.setItem('dailyMissionTime', nu);

                        //Finder alle knapper
                        var allButtons = optionsContainer.querySelectorAll('button');

                        //Låser alle knapper
                        for (var j = 0; j < allButtons.length; j++) {
                            allButtons[j].disabled = true;
                        }

                        //Tjekker om den klikkede knap er korrekt
                        if (this.dataset.correct === "true") {

                            //Gemmer korrekt status
                            localStorage.setItem('dailyMissionStatus', 'correct');

                            //Gør knappen grøn
                            this.className = "btn btn-success border-0 p-3 rounded-4 text-white fw-bold shadow-sm";

                            //Viser succes besked
                            questionText.innerHTML = "Rigtigt! Du har vundet 10 point.";

                            //Skifter ikon på forsiden
                            dailyMissionIcon.src = "img/icons/3d-icons/checkmark2.png";

                            //Venter 2 sekunder før point sendes
                            setTimeout(function() {

                                //Sender formularen
                                pointsForm.submit();

                            }, 2000);

                        } else {

                            //Gemmer forkert status
                            localStorage.setItem('dailyMissionStatus', 'wrong');

                            //Gør knappen rød
                            this.className = "btn btn-danger border-0 p-3 rounded-4 text-white fw-bold shadow-sm";

                            //Viser fejl besked
                            questionText.innerHTML = "Desværre, det var forkert. Prøv igen om 24 timer!";

                            //Skifter ikon til forkert ikon
                            dailyMissionIcon.src = "img/icons/3d-icons/wrong.png";

                            //Venter 2,5 sekunder før modalen lukkes
                            setTimeout(function() {

                                //Lukker modalen
                                dailyModal.show(); // rettet til show/hide alt efter ønske, koden havde dailyModal.hide() før
                                dailyModal.hide();

                            }, 2500);
                        }
                    });

                    //Sætter knappen ind i HTML
                    optionsContainer.appendChild(btn);
                }

                //Viser modalen
                dailyModal.show();
            });
    }
});