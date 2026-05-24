//Carousel script til forside.php

// Finder selve slider-containeren
const slider = document.getElementById('newsSlider');

// Finder containeren til indicator-stregerne
const indicatorsContainer = document.getElementById('sliderIndicators');

// Holder styr på hvilket slide der er aktivt lige nu
let currentSlideIndex = 0;

// Gemmer hvor mange slides der findes totalt
let totalSlides = 0;

// Gemmer timeren til auto-scroll funktionen
let autoScrollTimer;

// Henter nyhederne fra JSON filen med fetch
fetch('data/data_news.json')

    // Konverter response til JSON data
    .then(function(response) {
        return response.json();
    })

    // Når data er hentet korrekt
    .then(function(data) {

        // Gemmer antal nyheder/slides
        totalSlides = data.length;

        // Loop igennem alle nyheder og byg HTML
        data.forEach(function(news, index) {

            // Opretter selve kort-elementet som et link (a-tag) i stedet for en div
            const card = document.createElement('a');

            // Gør linket klikbart og peger på #
            card.href = '#';

            // Giver kortet CSS class samt Bootstrap-klasser for korrekt layout og ingen understregning
            card.className = 'fp-news-card text-decoration-none d-block';

            // Indsætter HTML indhold i kortet
            card.innerHTML = `
                <img src="${news.image}" alt="Nyhedsbillede" class="fp-news-bg">
                <div class="fp-news-overlay">
                    <div class="fp-news-title">${news.title}</div>
                    
                    <div class="fp-news-read-more mt-2">
                        LÆS MERE <i class="fa-solid fa-arrow-right ms-2"></i>
                    </div>
                </div>
            `;

            // Tilføjer kortet ind i slideren
            slider.appendChild(card);

            // Opretter indicator element
            const indicator = document.createElement('div');

            // Giver første indicator active class
            indicator.className = 'fp-indicator' + (index === 0 ? ' active' : '');

            // Tilføjer indicator til HTML
            indicatorsContainer.appendChild(indicator);
        });

        // Starter automatisk scroll
        startAutoScroll();

        // Holder øje med manuel scroll
        slider.addEventListener('scroll', updateActiveIndicator);
    });

// Funktion der opdaterer hvilken indicator der er aktiv
function updateActiveIndicator() {

    // Finder første nyhedskort
    const cardElement = slider.querySelector('.fp-news-card');

    // Stop hvis der ikke findes et kort
    if (!cardElement) return;

    // Finder kortets bredde + gap mellem kort
    const cardWidth = cardElement.offsetWidth + 15;

    // Finder hvilket slide der er tættest på midten
    const index = Math.round(slider.scrollLeft / cardWidth);

    // Finder alle indicator elementer
    const indicators = document.querySelectorAll('.fp-indicator');

    // Loop gennem alle indicators
    indicators.forEach(function(indicator, i) {

        // Hvis indicator matcher aktivt slide
        if (i === index) {

            // Gør indicator aktiv
            indicator.classList.add('active');

        } else {

            // Fjern active class
            indicator.classList.remove('active');
        }
    });

    // Gem aktivt slide index
    currentSlideIndex = index;
}

// Funktion der automatisk scroller videre
function startAutoScroll() {

    // Starter interval hvert 8 sekund
    autoScrollTimer = setInterval(function() {

        // Finder første nyhedskort
        const cardElement = slider.querySelector('.fp-news-card');

        // Stop hvis der ikke findes et kort
        if (!cardElement) return;

        // Gå til næste slide
        currentSlideIndex++;

        // Hvis vi er nået til sidste slide
        if (currentSlideIndex >= totalSlides) {

            // Start forfra
            currentSlideIndex = 0;
        }

        // Finder kort bredde + gap
        const cardWidth = cardElement.offsetWidth + 15;

        // Scroller smooth til næste kort
        slider.scrollTo({
            left: currentSlideIndex * cardWidth,
            behavior: 'smooth'
        });

    }, 5000); // 5000ms = 5 sekunder
}

// Stopper auto scroll midlertidigt
function stopAutoScroll() {

    // Stop interval timer
    clearInterval(autoScrollTimer);
}

// Stop auto scroll når brugeren rører slideren på mobil
slider.addEventListener('touchstart', stopAutoScroll);

// Stop auto scroll når brugeren klikker med mus
slider.addEventListener('mousedown', stopAutoScroll);


//DESKTOP MOUSE DRAG (Gør det muligt at trække med musen)
// Holder styr på om musen er klikket ned
let isDown = false;

// Gemmer start position på musen
let startX;

// Gemmer sliderens scroll position
let scrollLeft;

// Når brugeren klikker ned
slider.addEventListener('mousedown', function(e) {

    // Fortæl at musen er nede
    isDown = true;

    // Gem musens X position
    startX = e.pageX - slider.offsetLeft;

    // Gem nuværende scroll position
    scrollLeft = slider.scrollLeft;
});

// Når musen forlader slideren
slider.addEventListener('mouseleave', function() {

    // Stop drag
    isDown = false;
});

// Når brugeren slipper musen
slider.addEventListener('mouseup', function() {

    // Stop drag
    isDown = false;
});

// Når musen bevæger sig
slider.addEventListener('mousemove', function(e) {

    // Stop hvis musen ikke holdes nede
    if (!isDown) return;

    // Forhindrer markering af tekst (og forhindrer at browseren forsøger at "trække" i selve linket som et billede)
    e.preventDefault();

    // Finder nuværende mus position
    const x = e.pageX - slider.offsetLeft;

    // Udregner hvor langt der er trukket
    const walk = (x - startX) * 1.5;

    // Flytter slideren
    slider.scrollLeft = scrollLeft - walk;
});