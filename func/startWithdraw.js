function startWithdraw(form) {

    // run animation first
    const arrow = form.querySelector(".swipe_btn");
    const text = form.querySelector(".withdraw");

    //ændre styles af arrow og tekst
    arrow.style.right = "-50%";
    text.innerHTML = "Køber...";

    // wait before submitting form (so animation is visible)
    setTimeout(() => {
        form.submit();
    }, 500); // adjust time (500–1000ms is typical)
}