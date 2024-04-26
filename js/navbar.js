const navbar = document.getElementById('navbar');

window.addEventListener('scroll', function() {
    var threshold = 100; // soglia di scorrimento in pixel

    // console.log(window.scrollY);

    if (window.scrollY > threshold) navbar.classList.add('fixed'); 
    else navbar.classList.remove('fixed');
});