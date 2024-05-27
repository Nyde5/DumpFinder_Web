const btn_logout = document.getElementById('btn-logout').addEventListener('click', ()=>window.location.href = "index.php?logout=-1");
const closeDescriptionWindow = document.getElementById('closeDescriptionWindow').addEventListener('click', ()=>hideMotivationDiv());
const motivationBtn = document.getElementById('motivationBtn').addEventListener('click', ()=>sendMotivationMessage());
const motivationDiv = document.getElementById('motivationDiv');
const showJsError = document.getElementById('showJsError');

const motivation = document.getElementById('motivation');
motivation.addEventListener('input', ()=>checkMotivation());

let idAdmin = -1;

const obj_user_select = {
    idCardSel: -1,
    obj: -1,
    statusText: -1
};

function checkMotivation(){
    const showNumLetter = document.getElementById('showNumLetter');
    showNumLetter.innerText = 'Max ' + motivation.value.length + '/250 words';
}

function changeStatus(id, type, idElement){
    try {
        obj_user_select.obj = document.getElementById(idElement);

        const num = getNumber(idElement);

        obj_user_select.statusText = document.getElementById('statusText' + num);

        obj_user_select.obj.classList = 'bollino';
        let text = '';

        switch (type) {
            case 2:
                text = 'Approvata';
                obj_user_select.obj.classList.add('Approvata');
                break;
            case 3: 
                text = 'Rifiutata';
                showMotivationDiv();
                break;
            case 4:
                text = 'Bonificata';
                obj_user_select.obj.classList.add('Bonificata');
                break;    
        }

        obj_user_select.idCardSel = id;
        if(!text.includes('Rifiutata')){            
            obj_user_select.statusText.innerText = 'Stato: ' + text;
            changeValueOnDB(id, type);
        }
    } catch (error) {
        console.error("ERRORE JS: " + error);
    }

}

function changeValueOnDB(id, type){
    $.post('phphttp://dumpfinder.altervista.org/my_dumpfinder/mail_conferma.php', {
        id: id,
        type: type
    }, (data, status)=>{
        console.log(status);
    }, "json");
}

function showMotivationDiv() {
    motivationDiv.style.display = 'flex';
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            hideMotivationDiv();
        }
    });
}

function hideMotivationDiv(){
    motivationDiv.style.display = 'none';
}

function showError(message){
    showJsError.innerText = message;

    setTimeout(()=>{
        showJsError.innerText = ' ';
    }, 1500);
}

function sendMotivationMessage(){
    const motivation = document.getElementById('motivation').value;
    if(motivation.length > 10){
        $.post('http://dumpfinder.altervista.org/php/changeReportStatus.php', {
            id: obj_user_select.idCardSel,
            type: 3,
            motivation: motivation
        }, (data, status)=>{
            console.log(data);
        }, "json");   
        hideMotivationDiv();
        let text = 'Rifiutata';
        obj_user_select.obj.classList.add('Rifiutata');
        obj_user_select.statusText.innerText = 'Stato: ' + text;
    } else showError('Il Messaggio Deve Essere Almeno di 10 Caratteri');
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
