//Finder alle dagens mission cards
var dailyMissionCards = document.querySelectorAll('.fp-card-pink');

//Finder modal og modal-elementer i HTML
var modalElement = document.getElementById('dailyMissionModal');
var dailyModal = new bootstrap.Modal(modalElement);

//Finder modal indhold
var questionText = document.getElementById('missionQuestionText');
var optionsContainer = document.getElementById('missionOptionsContainer');

//Finder point formular
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

        //24 timer i millisekunder
        //var twentyFourHours = 86400000;

        //Test cooldown
        var twentyFourHours = 10000;

        //Tjekker om der stadig er cooldown
        if (timeDiff < twentyFourHours) {
            return true;
        }
    }

    //Ingen cooldown
    return false;
}


//Funktion der sætter dagens mission op
function setupDailyMission(card) {

    //Stop hvis card ikke findes
    if (!card) {
        return;
    }

    //Finder ikonet inde i cardet
    var dailyMissionIcon = card.querySelector('.fp-card-icon');


    //Skifter ikon hvis mission allerede er klaret
    if (hasCooldown()) {

        //Henter status fra localStorage
        var missionStatus = localStorage.getItem('dailyMissionStatus');

        //Hvis brugeren svarede forkert
        if (missionStatus === 'wrong') {

            //Vis forkert ikon
            dailyMissionIcon.src = "img/icons/3d-icons/wrong.png";

        } else {

            //Vis checkmark ikon
            dailyMissionIcon.src = "img/icons/3d-icons/checkmark2.png";
        }
    }


    //Lytter efter klik på dagens mission card
    card.addEventListener('click', function(event) {

        //Stopper linket i at hoppe til toppen
        event.preventDefault();


        //Tjekker om brugeren har cooldown
        if (hasCooldown()) {

            //Viser cooldown besked
            questionText.innerHTML = "Kom tilbage om 24 timer!";

            //Fjerner gamle knapper
            optionsContainer.innerHTML = "";

            //Viser modalen
            dailyModal.show();

        } else {

            //Henter spørgsmål fra JSON filen
            fetch('data/data_daily_mission.json')

                //Konverterer til JSON
                .then(function(response) {
                    return response.json();
                })

                //Når data er hentet
                .then(function(data) {

                    //Finder tilfældigt spørgsmål
                    var randomIndex = Math.floor(Math.random() * data.length);

                    //Gemmer spørgsmålet
                    var randomQuestion = data[randomIndex];

                    //Sætter spørgsmålet ind i modal
                    questionText.innerHTML = randomQuestion.question;

                    //Fjerner gamle knapper
                    optionsContainer.innerHTML = "";


                    //Loop gennem alle svarmuligheder
                    for (var i = 0; i < randomQuestion.options.length; i++) {

                        //Gemmer svarmulighed
                        var option = randomQuestion.options[i];

                        //Laver ny knap
                        var btn = document.createElement('button');

                        //Bootstrap styling
                        btn.className = "btn bg-white border p-3 rounded-4 text-dark fw-medium shadow-sm";

                        //Sætter tekst på knappen
                        btn.innerHTML = option.text;

                        //Gemmer korrekt/forkert status
                        btn.dataset.correct = option.correct;


                        //Klik på svarmulighed
                        btn.addEventListener('click', function() {

                            //Finder nuværende tidspunkt
                            var nu = new Date().getTime();

                            //Gemmer tidspunkt i localStorage
                            localStorage.setItem('dailyMissionTime', nu);

                            //Finder alle knapper
                            var allButtons = optionsContainer.querySelectorAll('button');

                            //Låser alle knapper
                            for (var j = 0; j < allButtons.length; j++) {

                                allButtons[j].disabled = true;
                            }


                            //Tjekker om svaret er korrekt
                            if (this.dataset.correct === "true") {

                                //Gemmer korrekt status
                                localStorage.setItem('dailyMissionStatus', 'correct');

                                //Gør knappen grøn
                                this.className = "btn btn-success border-0 p-3 rounded-4 text-white fw-bold shadow-sm";

                                //Succes besked
                                questionText.innerHTML = "Rigtigt! Du har vundet 10 point.";

                                //Skifter ikon
                                dailyMissionIcon.src = "img/icons/3d-icons/checkmark2.png";


                                //Venter 2 sekunder
                                setTimeout(function() {

                                    //Sender formularen
                                    pointsForm.submit();

                                }, 2000);

                            } else {

                                //Gemmer forkert status
                                localStorage.setItem('dailyMissionStatus', 'wrong');

                                //Gør knappen rød
                                this.className = "btn btn-danger border-0 p-3 rounded-4 text-white fw-bold shadow-sm";

                                //Fejl besked
                                questionText.innerHTML = "Desværre, det var forkert. Prøv igen om 24 timer!";

                                //Skifter ikon
                                dailyMissionIcon.src = "img/icons/3d-icons/wrong.png";


                                //Venter 2,5 sekunder
                                setTimeout(function() {

                                    //Lukker modalen
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
}


//Starter alle dagens mission cards
for (var i = 0; i < dailyMissionCards.length; i++) {

    setupDailyMission(dailyMissionCards[i]);
}