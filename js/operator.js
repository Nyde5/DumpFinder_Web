const btn_logout = document.getElementById('btn-logout').addEventListener('click', ()=>window.location.href = "index.php?logout=-1");
const motivationDiv = document.getElementById('motivationDiv');

const motivation = document.getElementById('motivation');
motivation.addEventListener('input', ()=>checkMotivation());

let idAdmin = -1;

function checkMotivation(){
    const showNumLetter = document.getElementById('showNumLetter');
    showNumLetter.innerText = 'Max ' + motivation.value.length + '/250 words';
}

function changeStatus(id, type, idElement){
    try {
        const elementClass = document.getElementById(idElement);

        const num = getNumber(idElement);

        const statusText = document.getElementById('statusText' + num);

        elementClass.classList = 'bollino';
        let text = '';

        switch (type) {
            case 2:
                text = 'Approvata';
                elementClass.classList.add('Approvata');
                break;
            case 3: 
                text = 'Rifiutata';
                // elementClass.classList.add('Rifiutata');
                showMotivationDiv();
                break;
            case 4:
                text = 'Bonificata';
                elementClass.classList.add('Bonificata');
                break;    
        }

        if(!text.includes('Rifiutata')){            
            statusText.innerText = 'Stato: ' + text;
            
            
            $.post('php/changeReportStatus.php', {
                id: id,
                type: type
            }, (data, status)=>{
                console.log(status);
            }, "json");
        }
    } catch (error) {
        console.error("ERRORE JS: " + error);
    }

}

function showMotivationDiv() {
    motivationDiv.style.display = 'flex';
}

function getNumber(string) {
    const numberStr = string.match(/\d+/g).join('');
    const number = parseInt(numberStr, 10);
    return number;
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

    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 27) {
            closeFullscreen();
        }
    });
}

function closeFullscreen() {
    let fullscreenImage = document.querySelector('.fullscreen-image');
    if (fullscreenImage) {
        fullscreenImage.parentNode.removeChild(fullscreenImage);
    }
}

function setIdAdmin(id) {
    idAdmin = id;
    console.log(idAdmin);
}
