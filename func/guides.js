/**
 * JS Motor til Førstehjælps-guides (-p)
 */

//array, der fungerer som en midlertidig database i browserens hukommelse; det gemmer alle trin (objekter) fra den valgte guide, så længe den kører.
let aktuelleTrinDataP = [];

//en integer-tæller (en del af appens state), der starter på 0 og tracker brugerens aktuelle trin i guiden, så systemet ved, hvilket objekt i arrayet der skal vises.
let nuvaerendeTrinIndexP = 0;

//Et array med korte instruktionsord (f.eks. "Tjek", "Ring"), som indsættes dynamisk som tekst på proces-knapperne i toppen for at give brugeren et hurtigt overblik.
let nuvaerendeBadgeNavneP = [];

//En tekststreng, der gemmer navnet på den aktive guide (f.eks. "Brandsår"), så titlen automatisk kan trækkes med over på den afsluttende succes-skærm.
let aktivGuideTitelP = "";

//En AJAX-funktion, der henter guide-data asynkront fra en JSON-fil via fetch(), definerer de korrekte top-badges og fjerner d-none klassen for at åbne guide-interfacet.
function indlaesGuideP(guideKey) {
    fetch('data/data_guide.json')
        .then(response => response.json())
        .then(data => {

            if (!data || !data[guideKey]) {
                console.error("Guiden kunne ikke findes i JSON: " + guideKey);
                return;
            }

            aktuelleTrinDataP = data[guideKey];
            nuvaerendeTrinIndexP = 0;

            const titelEl = document.getElementById('desktop-guide-titel-p');

            if (guideKey === 'hlr') {
                nuvaerendeBadgeNavneP = ["Tjek", "Ring", "Tryk", "Fortsæt"];
                aktivGuideTitelP = "Hjerte-lunge redning";

            } else if (guideKey === 'hjertestarter') {
                nuvaerendeBadgeNavneP = ["Tjek", "Tænd", "Sæt", "Følg"];
                if (titelEl) titelEl.innerText = "HLR med hjertestarter";

            } else if (guideKey === 'drukning') {
                nuvaerendeBadgeNavneP = ["Tjek", "Ring", "Luftvej", "HLR"];
                if (titelEl) titelEl.innerText = "Drukning";

            } else if (guideKey === 'blodning') {
                nuvaerendeBadgeNavneP = ["Ro", "Stop", "Løft", "Forbind", "Alarm"];
                aktivGuideTitelP = "Blødning";

            } else if (guideKey === 'brandsaar') {
                nuvaerendeBadgeNavneP = ["Ro", "Køl", "Fjern", "Dæk", "Varm", "Alarm"];
                aktivGuideTitelP = "Brandsår";

            } else if (guideKey === 'bilulykke') {
                nuvaerendeBadgeNavneP = ["Sikkerhed", "Tjek", "Ring", "Hjælp"];
                if (titelEl) titelEl.innerText = "Bilulykke";

            } else if (guideKey === 'kvaelning') {
                nuvaerendeBadgeNavneP = ["Host", "Slag", "Tryk", "Ring"];
                if (titelEl) titelEl.innerText = "Kvælning";

            } else if (guideKey === 'stroke') {
                nuvaerendeBadgeNavneP = ["Ansigt", "Arm", "Tale", "Ring"];
                if (titelEl) titelEl.innerText = "Stroke";

            } else if (guideKey === 'bevidstloshed') {
                nuvaerendeBadgeNavneP = ["Tjek", "Ring", "Luftvej", "Sideleje", "HLR"];
                aktivGuideTitelP = "Bevidstløshed";

            } else if (guideKey === 'psykisk') {
                nuvaerendeBadgeNavneP = ["Ro", "Lyt", "Støt", "Hjælp"];
                if (titelEl) titelEl.innerText = "Psykisk Førstehjælp";

            } else {
                nuvaerendeBadgeNavneP = [];
                aktivGuideTitelP = guideKey;
            }

            if (titelEl) {
                titelEl.innerText = aktivGuideTitelP;
            }

            const overlay = document.getElementById('desktop-overlay-p');
            const contentArea = document.getElementById('guide-content-area-p');
            const infoPanel = document.getElementById('desktopInfo');

            if (overlay) overlay.classList.add('d-none');
            if (infoPanel) infoPanel.classList.add('d-none');
            if (contentArea) contentArea.classList.remove('d-none');

            visTrinP();
        })
        .catch(error => {
            console.error("Fejl ved hentning af JSON-data: ", error);
        });
}


//En DOM-funktion, der opdaterer skærmens indhold (billede, tekst og den rosa husk-boks) dynamisk, genererer proces-prikker i bunden og ændrer næste-knappen til en afslut-knap på det sidste trin.
function visTrinP() {
    if (!aktuelleTrinDataP || aktuelleTrinDataP.length === 0 || !aktuelleTrinDataP[nuvaerendeTrinIndexP]) {
        return;
    }

    const trin = aktuelleTrinDataP[nuvaerendeTrinIndexP];

    const imgEl = document.getElementById('desktop-billede-p');
    const titelEl = document.getElementById('desktop-trin-titel-p');
    const tekstEl = document.getElementById('desktop-tekst-p');
    const huskEl = document.getElementById('desktop-husk-p');
    const huskContainer = document.getElementById('desktop-husk-container-p');

    if (imgEl) imgEl.src = trin.billede;
    if (titelEl) titelEl.innerText = trin.titel;
    if (tekstEl) tekstEl.innerText = trin.tekst;

    if (huskContainer && huskEl) {
        if (trin.husk && trin.husk.trim() !== "") {
            huskEl.innerText = trin.husk;
            huskContainer.style.display = "block";
        } else {
            huskContainer.style.display = "none";
            huskEl.innerText = "";
        }
    }

    const badgesContainer = document.getElementById('desktop-badges-p');

    if (badgesContainer) {
        let badgesHTML = '';

        nuvaerendeBadgeNavneP.forEach((navn, i) => {
            if (i === nuvaerendeTrinIndexP) {
                badgesHTML += `<button type="button" class="step-badge-p active">${navn}</button>`;
            } else if (i < nuvaerendeTrinIndexP) {
                badgesHTML += `<button type="button" class="step-badge-p" onclick="hopTilTrinP(${i})">${navn}</button>`;
            } else {
                badgesHTML += `<button type="button" class="step-badge-p disabled-step" disabled>${navn}</button>`;
            }
        });

        badgesContainer.innerHTML = badgesHTML;
    }

    const btn = document.getElementById('desktop-next-btn-p');

    if (btn) {
        if (nuvaerendeTrinIndexP === aktuelleTrinDataP.length - 1) {
            btn.innerText = "AFSLUT GUIDE";
            btn.style.backgroundColor = "#2196F3";
            btn.onclick = afslutGuideP;
        } else {
            btn.innerText = "NÆSTE TRIN";
            btn.style.backgroundColor = "#5CD685";
            btn.onclick = naesteTrinP;
        }
    }

    const progressContainer = document.getElementById('desktop-progress-p');

    if (progressContainer) {

        let dotsHTML = '';

        for (let i = 0; i < aktuelleTrinDataP.length; i++) {

            if (i === nuvaerendeTrinIndexP) {
                dotsHTML += `<span class="dot active"></span>`;
            } else {
                dotsHTML += `<span class="dot"></span>`;
            }
        }

        progressContainer.innerHTML = dotsHTML;
    }
}

//En navigationsfunktion, der tjekker, om der er flere trin tilbage, lægger 1 til nuvaerendeTrinIndexP (inkrementering) og kalder visTrinP() for at loade det næste skærmbillede.
function naesteTrinP() {
    if (nuvaerendeTrinIndexP < aktuelleTrinDataP.length - 1) {
        nuvaerendeTrinIndexP++;
        visTrinP();
    }
}

//En valideringsfunktion, der modtager et trins indeks som argument og tillader, at brugeren klikker sig bagud i forløbet, men blokerer for at springe fremad (if (index < nuvaerendeTrinIndexP)).
function hopTilTrinP(index) {
    if (index < nuvaerendeTrinIndexP) {
        nuvaerendeTrinIndexP = index;
        visTrinP();
    }
}

//En funktionsudløser, der danner en personlig afslutningstekst ud fra aktivGuideTitelP og kalder Bootstraps JavaScript API (.show()) til at åbne en succesmodal (popup-vindue).
function afslutGuideP() {
    const completionText = document.getElementById('desktopCompletionText-p');

    if (completionText) {
        completionText.innerText = "Du har gennemført guiden i " + aktivGuideTitelP + ".";
    }

    const modalEl = document.getElementById('desktopCompletionModal-p');

    if (modalEl) {
        const myModal = new bootstrap.Modal(modalEl);
        myModal.show();
    }
}

//En oprydningsfunktion, der nulstiller appens tilstand (state) ved at lukke succesmodalen, tømme alle globale variable (arrays og strenge) og bringe start-overlayet tilbage på skærmen.
function nulstilDesktopP() {
    const modalEl = document.getElementById('desktopCompletionModal-p');

    if (modalEl) {
        const modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) modalInstance.hide();
    }

    const contentArea = document.getElementById('guide-content-area-p');
    const overlay = document.getElementById('desktop-overlay-p');
    const infoPanel = document.getElementById('desktopInfo');

    if (contentArea) contentArea.classList.add('d-none');
    if (infoPanel) infoPanel.classList.add('d-none');
    if (overlay) overlay.classList.remove('d-none');

    aktuelleTrinDataP = [];
    nuvaerendeTrinIndexP = 0;
    nuvaerendeBadgeNavneP = [];
    aktivGuideTitelP = "";
}

const closeDesktopInfo = document.getElementById('closeDesktopInfo');

if (closeDesktopInfo) {

    closeDesktopInfo.addEventListener('click', function () {

        const overlay = document.getElementById('desktop-overlay-p');
        const infoPanel = document.getElementById('desktopInfo');

        if (infoPanel) {
            infoPanel.classList.add('d-none');
        }

        if (overlay) {
            overlay.classList.remove('d-none');
        }
    });
}

// En sikkerhedsmotor, der venter på, at hele HTML-strukturen (DOM-træet) er indlæst, før JavaScriptet binder klik-lyttere til knapperne, hvilket forhindrer systemnedbrud. Den rummer tre sub-lyttere:
document.addEventListener("DOMContentLoaded", function () {


    //Aflæser data-guide-key på det kort, der klikkes på (f.eks. hlr), og sender det til indlaesGuideP().
document.querySelectorAll('.guide-trigger').forEach(card => {
    card.addEventListener('click', function () {
        const guideKey = card.getAttribute('data-guide-key');

        if (guideKey) {
            indlaesGuideP(guideKey);
        }
    });
});

//Suger data ud af kortets egne data-attributter på de tre øverste kort (De 4 H'er, ABC, Alarm) og planter det direkte i infopanelet uden en ny JSON-anmodning.
document.querySelectorAll('.desktop-info-trigger').forEach(card => {
    card.addEventListener('click', function () {
        const overlay = document.getElementById('desktop-overlay-p');
        const contentArea = document.getElementById('guide-content-area-p');
        const infoPanel = document.getElementById('desktopInfo');

        const infoTitle = document.getElementById('desktopInfoTitle');
        const infoText = document.getElementById('desktopInfoText');
        const infoImage = document.getElementById('desktopInfoImage');

        if (overlay) overlay.classList.add('d-none');
        if (contentArea) contentArea.classList.add('d-none');
        if (infoPanel) infoPanel.classList.remove('d-none');

        if (infoTitle) infoTitle.innerText = card.getAttribute('data-title');
        if (infoText) infoText.innerText = card.getAttribute('data-text');
        if (infoImage) infoImage.src = card.getAttribute('data-image');
    });
});


//En genanvendelig Bootstrap-lytter bygget ud fra DRY-princippet (Don't Repeat Yourself); den fanger, hvilket kort der trykkes på på mobilen, og overfører dets data-title og data-text ind i én og samme HTML-modal.
    const infoModal = document.getElementById('infoModalMobil');

    if (infoModal) {
        infoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const title = button.getAttribute('data-title');
            const text = button.getAttribute('data-text');

            const modalTitle = infoModal.querySelector('#infoModalMobilLabel');

            const modalBodyText = infoModal.querySelector('#modalBodyTextMobil');

            if (modalTitle) modalTitle.innerText = title;
            if (modalBodyText) modalBodyText.innerText = text;
        });
    }
});