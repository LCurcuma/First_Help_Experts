//=========================================================================
// FUNKTION TIL AT STARTE EN KARRUSEL (Genanvendelig til mobil og desktop)
//=========================================================================
function opretKarrusel(sliderId, indicatorsId) {
    const slider = document.getElementById(sliderId);
    const indicatorsContainer = document.getElementById(indicatorsId);

    // Hvis karrusellen ikke findes på skærmen, stopper vi koden her
    if (!slider || !indicatorsContainer) return;

    let currentSlideIndex = 1;
    let totalSlides = 0;
    let autoScrollTimer;
    let cardWidth = 0;
    let scrollTimeout;

    // Henter nyhederne fra JSON filen med fetch [cite: 659]
    fetch('data/data_news.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            totalSlides = data.length;

            // Loop igennem alle nyheder og opret HTML [cite: 659]
            data.forEach(function(news, index) {
                const card = createCardHTML(news);
                slider.appendChild(card);

                // Opretter indicator prikker i bunden [cite: 659]
                const indicator = document.createElement('div');
                indicator.className = 'fp-indicator' + (index === 0 ? ' active' : '');
                indicatorsContainer.appendChild(indicator);
            });

            // KLONING TIL UENDELIGT LOOP [cite: 660, 661]
            const firstClone = slider.firstElementChild.cloneNode(true);
            const lastClone = slider.lastElementChild.cloneNode(true);

            slider.appendChild(firstClone);
            slider.insertBefore(lastClone, slider.firstElementChild);

            // Vent på at browseren renderer, og find bredden på kortet [cite: 663]
            setTimeout(() => {
                const cardElement = slider.querySelector('.fp-news-card');
                if (cardElement) {
                    cardWidth = cardElement.offsetWidth + 15;
                    slider.style.scrollBehavior = 'auto';
                    slider.scrollLeft = cardWidth;

                    startAutoScroll();
                    slider.addEventListener('scroll', handleInfiniteScroll);
                }
            }, 100);
        });

    // Funktion der opretter HTML til et nyhedskort [cite: 664]
    function createCardHTML(news) {
        const card = document.createElement('a');
        card.href = news.link;
        card.className = 'fp-news-card text-decoration-none d-block';
        card.innerHTML = `
            <img src="${news.image}" alt="Nyhedsbillede" class="fp-news-bg">
            <div class="fp-news-overlay">
                <div class="fp-news-title">${news.title}</div>
                <div class="fp-news-read-more mt-2">
                    LÆS MERE <i class="fa-solid fa-arrow-right ms-2"></i>
                </div>
            </div>
        `;
        return card;
    }

    // Funktion der håndterer infinite scroll og aktive prikker [cite: 668]
    function handleInfiniteScroll() {
        if (!cardWidth) return;
        const index = Math.round(slider.scrollLeft / cardWidth);
        currentSlideIndex = index;

        let indicatorIndex = index - 1;
        if (indicatorIndex >= totalSlides) {
            indicatorIndex = 0;
        }
        if (indicatorIndex < 0) {
            indicatorIndex = totalSlides - 1;
        }

        // Finder prikkerne specifikt i denne karrusel [cite: 673]
        const indicators = indicatorsContainer.querySelectorAll('.fp-indicator');
        indicators.forEach((indicator, i) => {
            if (i === indicatorIndex) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });

        // Tjekker om vi har scrollet forbi enderne og skal hoppe usynligt [cite: 676, 677]
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            if (currentSlideIndex === 0) {
                jumpToPosition(totalSlides * cardWidth);
                currentSlideIndex = totalSlides;
            } else if (currentSlideIndex === totalSlides + 1) {
                jumpToPosition(cardWidth);
                currentSlideIndex = 1;
            }
        }, 250);
    }

    // Hjælpefunktion til usynligt hop mellem slides [cite: 678]
    function jumpToPosition(position) {
        slider.style.scrollBehavior = 'auto';
        slider.scrollLeft = position;
        void slider.offsetWidth;
        slider.style.scrollBehavior = 'smooth';
    }

    // Funktion der automatisk scroller videre [cite: 681]
    function startAutoScroll() {
        autoScrollTimer = setInterval(function() {
            if (!cardWidth) return;
            if (currentSlideIndex >= totalSlides + 1) {
                jumpToPosition(cardWidth);
                currentSlideIndex = 1;
            }
            currentSlideIndex++;
            slider.style.scrollBehavior = 'smooth';
            slider.scrollLeft = currentSlideIndex * cardWidth;
        }, 5000);
    }

    // Stopper auto-scroll [cite: 684]
    function stopAutoScroll() {
        clearInterval(autoScrollTimer);
    }

    // Lyttere til at stoppe scroll ved berøring [cite: 685, 686]
    slider.addEventListener('touchstart', stopAutoScroll, { passive: true });
    slider.addEventListener('mousedown', stopAutoScroll);
}

//=========================================================================
// AKTIVER KARRUSELLERNE FOR BÅDE MOBIL OG DESKTOP
//=========================================================================
opretKarrusel('newsSlider', 'sliderIndicators');
opretKarrusel('newsSliderDesktop', 'sliderIndicatorsDesktop');