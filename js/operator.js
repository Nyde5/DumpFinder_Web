const btn_logout = document.getElementById('btn-logout').addEventListener('click', ()=>window.location.href = "index.php?logout=-1");

function changeStatus(id, type, idElement){

    const elementClass = document.getElementById(idElement);
    elementClass.classList = 'bollino';

    switch (type) {
        case 2:
            elementClass.classList.add('Approvata');
            break;
        case 3: 
            elementClass.classList.add('Rifiutata');
            break;
        case 4:
            elementClass.classList.add('Bonificata');
            break;    
    }


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


