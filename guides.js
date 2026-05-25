/**
 * JS Motor til Førstehjælps-guides (-p)
 */
let aktuelleTrinDataP = [];
let nuvaerendeTrinIndexP = 0;
let nuvaerendeBadgeNavneP = [];

function indlaesGuideP(guideKey) {
    fetch('data/data_guide.json')
        .then(response => response.json())
        .then(data => {
            // SIKKERHED: Tjek om guiden faktisk findes i JSON-dataen
            if (!data || !data[guideKey]) {
                console.error("Guiden kunne ikke findes i JSON: " + guideKey);
                return;
            }

            aktuelleTrinDataP = data[guideKey];
            nuvaerendeTrinIndexP = 0;

            // Sæt titler og badges dynamisk baseret på guiden
            if(guideKey === 'hlr') {
                nuvaerendeBadgeNavneP = ["Tjek", "Ring", "Tryk", "Fortsæt"];
                document.getElementById('desktop-guide-titel-p').innerText = "Hjerte-lunge redning";
            } else if(guideKey === 'blødning') {
                nuvaerendeBadgeNavneP = ["Ro", "Stop", "Løft", "Forbind", "Alarm"];
                document.getElementById('desktop-guide-titel-p').innerText = "Blødning";
            } else if(guideKey === 'brandsår') {
                nuvaerendeBadgeNavneP = ["Ro", "Køl", "Fjern", "Dæk", "Varm", "Alarm"];
                document.getElementById('desktop-guide-titel-p').innerText = "Brandsår";
            } else if(guideKey === 'bevidstløshed') {
                nuvaerendeBadgeNavneP = ["Tjek", "Ring", "Luftvej", "Sideleje", "HLR"];
                document.getElementById('desktop-guide-titel-p').innerText = "Bevidstløshed";
            }

            // Vis skærmen og skjul overlayet
            const overlay = document.getElementById('desktop-overlay-p');
            const contentArea = document.getElementById('guide-content-area-p');

            if(overlay) overlay.classList.add('d-none');
            if(contentArea) contentArea.classList.remove('d-none');

            // Kald først visTrin efter dataene er lagt helt på plads
            visTrinP();
        })
        .catch(error => {
            console.error("Fejl ved hentning af JSON-data: ", error);
        });
}

function visTrinP() {
    // FIX FOR LINJE 33 CRASH: Hvis data ikke er hentet eller arrayet er tomt, stop funktionen med det samme
    if (!aktuelleTrinDataP || aktuelleTrinDataP.length === 0 || !aktuelleTrinDataP[nuvaerendeTrinIndexP]) {
        return;
    }

    let trin = aktuelleTrinDataP[nuvaerendeTrinIndexP];

    // Opdater elementer på siden med sikkerhedstjek (så det ikke crasher hvis et ID mangler)
    const imgEl = document.getElementById('desktop-billede-p');
    const titelEl = document.getElementById('desktop-trin-titel-p');
    const tekstEl = document.getElementById('desktop-tekst-p');
    const huskEl = document.getElementById('desktop-husk-p');


    if (imgEl) imgEl.src = trin.billede;
    if (titelEl) titelEl.innerText = trin.titel;
    if (tekstEl) tekstEl.innerText = trin.tekst;

    // NY RELEVANT PLACERING (Styrer om din nye HTML-boks vises eller skjules):
    const huskContainer = document.getElementById('desktop-husk-container-p');
    if (huskContainer && huskEl) {
        if (trin.husk && trin.husk.trim() !== "") {
            huskEl.innerText = trin.husk;          // Sætter selve teksten ind i din <span>
            huskContainer.style.display = "block"; // Viser den rosa boks
        } else {
            huskContainer.style.display = "none";  // Skjuler boksen helt, hvis trinnet ikke har en husk-tekst
            huskEl.innerText = "";
        }
    }

    // Byg badges i toppen med mobil-looket (Tydelig knap hele tiden)
    const badgesContainer = document.getElementById('desktop-badges-p');
    if (badgesContainer) {
        let badgesHTML = '';
        nuvaerendeBadgeNavneP.forEach((navn, i) => {
            if (i === nuvaerendeTrinIndexP) {
                // Aktivt trin (Grønt via CSS)
                badgesHTML += `<button type="button" class="step-badge-p active">${navn}</button>`;
            } else if (i < nuvaerendeTrinIndexP) {
                // Tidligere trin (Hvidt via CSS - klikbart bagud)
                badgesHTML += `<button type="button" class="step-badge-p" onclick="hopTilTrinP(${i})">${navn}</button>`;
            } else {
                // Fremtidigt trin (Tydeligt hvidt udseende, men låst for klik fremad)
                badgesHTML += `<button type="button" class="step-badge-p disabled-step" disabled>${navn}</button>`;
            }
        });
        badgesContainer.innerHTML = badgesHTML;
    }

    // Konfigurer knappen i bunden
    let btn = document.getElementById('desktop-next-btn-p');
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
}

function naesteTrinP() {
    if (nuvaerendeTrinIndexP < aktuelleTrinDataP.length - 1) {
        nuvaerendeTrinIndexP++;
        visTrinP();
    }
}

function hopTilTrinP(index) {
    // SIKKERHEDSTJEK: Man kan kun hoppe til trin, der ligger FØR det nuværende trin
    if (index < nuvaerendeTrinIndexP) {
        nuvaerendeTrinIndexP = index;
        visTrinP();
    }
}

function afslutGuideP() {
    let modalEl = document.getElementById('desktopCompletionModal-p');
    if (modalEl) {
        let myModal = new bootstrap.Modal(modalEl);
        myModal.show();
    }
}

function nulstilDesktopP() {
    let modalEl = document.getElementById('desktopCompletionModal-p');
    if (modalEl) {
        let modalInstance = bootstrap.Modal.getInstance(modalEl);
        if(modalInstance) modalInstance.hide();
    }

    const contentArea = document.getElementById('guide-content-area-p');
    const overlay = document.getElementById('desktop-overlay-p');

    if (contentArea) contentArea.classList.add('d-none');
    if (overlay) overlay.classList.remove('d-none');
}

// Vent på at DOM'en er helt klar
document.addEventListener("DOMContentLoaded", function () {
    const infoModal = document.getElementById('infoModal');

    if (infoModal) {
        infoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const title = button.getAttribute('data-title');
            const text = button.getAttribute('data-text');

            const modalTitle = infoModal.querySelector('#infoModalLabel');
            const modalBodyText = infoModal.querySelector('#modalBodyText');

            if (modalTitle) modalTitle.innerText = title;
            if (modalBodyText) modalBodyText.innerText = text;
        });
    }
});