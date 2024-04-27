function changeStatus(id, type, idElement){

    const elementClass = document.getElementById(idElement);
    console.log(elementClass);

    elementClass.classList.remove()

    $.post('php/changeReportStatus.php', {
        id: id,
        type: type
    }, (data, status)=>{
        console.log(status);
    }, "json");
}


function openFullscreen(element) {
    let imageSrc = element.getAttribute('data-src');
    let fullscreenImage = document.createElement('div');
    
    fullscreenImage.classList.add('fullscreen-image');

    let imgElement = document.createElement('img');
    imgElement.src = imageSrc;
    fullscreenImage.appendChild(imgElement);

    document.body.appendChild(fullscreenImage);

    fullscreenImage.style.display = 'flex';
    fullscreenImage.addEventListener('click', closeFullscreen);
}


function closeFullscreen() {
    let fullscreenImage = document.querySelector('.fullscreen-image');
    fullscreenImage.parentNode.removeChild(fullscreenImage);
}


