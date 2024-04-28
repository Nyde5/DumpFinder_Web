document.addEventListener('DOMContentLoaded',()=>{
  $.post('php/getStat.php', {
    value: 100
  }, (data, status)=>{
    setDataStat(data);
  }, "json");
  
});

const struct = [];
let isOnStat = false;

function setDataStat(data){
  data.forEach(element => {
    div = document.getElementById(element.Category);
    struct.push({
      div: div,
      value: parseInt(element.Count)
    });
  });
  struct.forEach(element => {
    let i = 0;
    const setStat = setInterval(()=>{
      if(isOnStat){
        element.div.innerText = i;
        if(i < element.value)i++;
        else clearInterval(setStat);
      }
    }, 150);
  });
}

window.addEventListener('scroll', function() {
  var puntoDiAncoraggio = document.getElementById('stat');
  var posizionePuntoDiAncoraggio = puntoDiAncoraggio.getBoundingClientRect().top;
  if (posizionePuntoDiAncoraggio < window.innerHeight) {
      isOnStat = true;
  }
});