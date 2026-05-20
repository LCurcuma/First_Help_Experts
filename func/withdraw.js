
function withdraw(points){
    //elements
    let pointsContainerMobile = document.getElementById("points_mobile");
    let pointsContainerDesktop = document.getElementById("points_desk");
    let withdrawText = document.getElementById("withdraw_text");
    //values (vil tage data om points, når database bliver klar
    let currentPointsMobile = parseInt(document.getElementById("points_mobile").textContent, 10);
    let currentPointsDesktop = parseInt(document.getElementById("points_desk").textContent, 10);
    let pointsNum = parseInt(points, 10);

    //for nu, den tage data fra points containers, som er forskellige på mobil og desktop
    //derfor den tjekker, hvis side har mobil eller desktop version
    //når vi laver database, det vil fjernes
    if(currentPointsMobile !== null){
        //hvis man har nok points for at købe den
        if(pointsNum <= currentPointsMobile){
            //ændre style af arrow-knap, så det "swipes" (knap går til højre)
            document.getElementById("arrow_button").style.right = "-50%";
            //tager nødvendigt points for noget
            let newPoints = currentPointsMobile - pointsNum;
            //converterer til string
            newPoints = newPoints.toString();
            //ændrer points på container
            pointsContainerMobile.innerHTML = newPoints;
            pointsContainerDesktop.innerHTML = newPoints;
            //ændrer withdraw til købt
            withdrawText.innerHTML = "Købt";
        } else {
            //hvis der er ikke nok points, så taller til man, at der er ikke nok points
            alert("Ikke nok point");
        }
        //den samme, men den tage data fra desktop container, så den virker på desktop version
    } else if(currentPointsDesktop !== null){
        if(pointsNum <= currentPointsDesktop){
            document.getElementById("arrow_button").style.right = "-50%";
            document.getElementById("arrow_button").style.transform = "rotate(180deg)";
            let newPoints = currentPointsDesktop - pointsNum;
            newPoints = newPoints.toString();
            pointsContainerMobile.innerHTML = newPoints;
            pointsContainerDesktop.innerHTML = newPoints;
            withdrawText.innerHTML = "Købt";
        } else {
            alert("Ikke nok point");
        }
        //ellers, hvis den tage ikke data fra de to pladser, logs, at der er ikke noget data
        //den er mere for test
    } else {
        console.log("Nothing :(")
    }
}