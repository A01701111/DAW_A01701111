
let myInput = document.getElementById("docum");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}


// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
let str="<p id='mssg'>Fabulous</p>";
setTimeout(function(){
    document.getElementById("mssg1").innerHTML = str;
},4000);
let count = 0;
let str2="";
function tm(segundos) {
    let stringTime="";
    if (segundos<60) {
        stringTime= "00:"+segundos;
    }
    else{
        let min = segundos / 60;
        let seg = segundos % 60;
        if (min>9) {
            console.log("here");
            stringTime = min+":"+seg;
        }
        else{
            if (seg<10) {
                stringTime ="0"+min+":0"+seg;
            }
            else{
                stringTime ="0"+min+":"+seg;
            }
        }
    }
    return stringTime;
}   


setInterval(() => {
    count++;
    document.getElementById("mssg2").innerHTML = "Llevas " + tm(count) +" segundos en esta pagina" ;
    
}, 1000);
function allowDrop(ev) {
    ev.preventDefault();
  }
  
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  
  function drop(ev) {
    ev.preventDefault();
    let data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
  }