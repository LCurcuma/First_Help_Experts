//Carousel script til forside.php


//Finder selve slider-containeren
const slider = document.getElementById('newsSlider');

//Finder containeren til indicator-stregerne
const indicatorsContainer = document.getElementById('sliderIndicators');


//Holder styr på hvilket slide der er aktivt lige nu
//Starter på 1 fordi første rigtige slide kommer efter den første klon
let currentSlideIndex = 1;

//Gemmer hvor mange slides der findes totalt
let totalSlides = 0;

//Gemmer timeren til auto-scroll funktionen
let autoScrollTimer;

//Gemmer bredden på hvert kort inklusiv gap
let cardWidth = 0;

//Bruges til debounce på infinite scroll
let scrollTimeout;


//Henter nyhederne fra JSON filen med fetch
fetch('data/data_news.json')

    //Konverter response til JSON data
    .then(function(response) {
        return response.json();
    })

    //Når data er hentet korrekt
    .then(function(data) {

        //Gemmer antal nyheder/slides
        totalSlides = data.length;

        //Loop igennem alle nyheder og opret HTML
        data.forEach(function(news, index) {

            //Opretter nyt kort via hjælpefunktion
            const card = createCardHTML(news);

            //Tilføjer kortet ind i slideren
            slider.appendChild(card);

            //Opretter indicator element
            const indicator = document.createElement('div');

            //Giver første indicator active class
            indicator.className = 'fp-indicator' + (index === 0 ? ' active' : '');

            //Tilføjer indicator til HTML
            indicatorsContainer.appendChild(indicator);
        });


        //=========================
        //KLONING TIL UENDELIGT LOOP
        //=========================

        //Kloner første slide
        const firstClone = slider.firstElementChild.cloneNode(true);

        //Kloner sidste slide
        const lastClone = slider.lastElementChild.cloneNode(true);

        //Tilføjer første slide-klon til slutningen
        slider.appendChild(firstClone);

        //Tilføjer sidste slide-klon til starten
        slider.insertBefore(lastClone, slider.firstElementChild);


        //Vent kort så browseren når at rendere elementerne
        setTimeout(() => {

            //Finder første kort
            const cardElement = slider.querySelector('.fp-news-card');

            //Stop hvis der ikke findes et kort
            if (cardElement) {

                //Finder kortets bredde + gap mellem kort
                cardWidth = cardElement.offsetWidth + 15;

                //Tvinger et usynligt hop til første rigtige slide uden animation
                slider.style.scrollBehavior = 'auto';
                slider.scrollLeft = cardWidth;

                //Starter auto-scroll
                startAutoScroll();

                //Holder øje med scroll til infinite loop og indicators
                slider.addEventListener('scroll', handleInfiniteScroll);
            }

        }, 100);
    });


//Funktion der opretter HTML til et nyhedskort
function createCardHTML(news) {

    //Opretter selve kort-elementet som et link
    const card = document.createElement('a');

    //Gør linket klikbart
    card.href = news.link;

    //Giver kortet CSS classes
    card.className = 'fp-news-card text-decoration-none d-block';

    //Indsætter HTML indhold i kortet
    card.innerHTML = `
        <img src="${news.image}" alt="Nyhedsbillede" class="fp-news-bg">

        <div class="fp-news-overlay">

            <div class="fp-news-title">
                ${news.title}
            </div>

            <div class="fp-news-read-more mt-2">
                LÆS MERE <i class="fa-solid fa-arrow-right ms-2"></i>
            </div>

        </div>
    `;

    //Returnerer det færdige kort
    return card;
}


//Funktion der håndterer infinite scroll og active indicators
function handleInfiniteScroll() {

    //Stop hvis cardWidth ikke er fundet endnu
    if (!cardWidth) return;

    //Finder hvilket slide der er aktivt
    const index = Math.round(slider.scrollLeft / cardWidth);

    //Gemmer aktivt slide index
    currentSlideIndex = index;

    //OPDATER ACTIVE INDICATOR
    //Regner rigtig indicator ud
    let indicatorIndex = index - 1;

    //Hvis vi er forbi sidste slide
    if (indicatorIndex >= totalSlides) {
        indicatorIndex = 0;
    }

    //Hvis vi er før første slide
    if (indicatorIndex < 0) {
        indicatorIndex = totalSlides - 1;
    }

    //Finder alle indicators
    const indicators = document.querySelectorAll('.fp-indicator');

    //Loop gennem alle indicators
    indicators.forEach((indicator, i) => {

        //Hvis indicator matcher aktivt slide
        if (i === indicatorIndex) {

            //Gør indicator aktiv
            indicator.classList.add('active');

        } else {

            //Fjern active class
            indicator.classList.remove('active');
        }
    });

    //UENDELIGT LOOP LOGIK
    //Debounce for at sikre at scroll er stoppet helt
    clearTimeout(scrollTimeout);

    scrollTimeout = setTimeout(() => {

        //Hvis man manuelt trækker tilbage før første slide
        if (currentSlideIndex === 0) {

            //Hopper usynligt til sidste rigtige slide
            jumpToPosition(totalSlides * cardWidth);

            //Opdaterer index
            currentSlideIndex = totalSlides;
        }

        //Hvis man når forbi sidste slide
        else if (currentSlideIndex === totalSlides + 1) {

            //Hopper usynligt tilbage til første rigtige slide
            jumpToPosition(cardWidth);

            //Opdaterer index
            currentSlideIndex = 1;
        }

    }, 250);
}


//Hjælpefunktion til usynligt hop mellem slides
function jumpToPosition(position) {

    //Slår animation fra
    slider.style.scrollBehavior = 'auto';

    //Hopper direkte til positionen
    slider.scrollLeft = position;

    //Tvinger browseren til at registrere ændringen
    //Dette fjerner rewind-effekten
    void slider.offsetWidth;

    //Slår smooth scroll til igen
    slider.style.scrollBehavior = 'smooth';
}


//Funktion der automatisk scroller videre
function startAutoScroll() {

    //Starter interval hvert 5 sekund
    autoScrollTimer = setInterval(function() {

        //Stop hvis cardWidth ikke findes endnu
        if (!cardWidth) return;

        //SIKKERHEDSNET
        //Hvis browser-tab var inaktivt og scroll-event ikke blev fanget
        if (currentSlideIndex >= totalSlides + 1) {

            //Hopper tilbage til første slide
            jumpToPosition(cardWidth);

            //Reset index
            currentSlideIndex = 1;
        }


        //Gå til næste slide
        currentSlideIndex++;

        //SMOOTH SCROLL TIL NÆSTE
        //Slår smooth scroll til
        slider.style.scrollBehavior = 'smooth';

        //Scroller til næste kort
        slider.scrollLeft = currentSlideIndex * cardWidth;

    }, 5000); //5000ms = 5 sekunder
}


//Stopper auto-scroll midlertidigt
function stopAutoScroll() {

    //Stop interval timer
    clearInterval(autoScrollTimer);
}


//Stop auto-scroll når brugeren rører slideren på mobil
slider.addEventListener('touchstart', stopAutoScroll, { passive: true });

//Stop auto-scroll når brugeren klikker på slideren med mus
slider.addEventListener('mousedown', stopAutoScroll);