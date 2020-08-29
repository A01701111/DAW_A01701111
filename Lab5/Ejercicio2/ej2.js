let cantidad1 = 0,
    cantidad2 = 0,
    cantidad3 = 0,
    tot = 0;

function carrito(artNum, action) {

    //artNum 0 = avion, 1 = guerrero y 3 = bacardi
    //Acction 0 = plus, 1 = minus
    switch (artNum) {
        case 0:
            if (action == 0) {
                cantidad1++;
                tot += 3263040000;
                document.getElementById("artCount1").innerHTML = cantidad1;
                console.log(cantidad1)
            } else if (action == 1 && cantidad1 > 0) {
                cantidad1--;
                tot -= 3263040000;
                document.getElementById("artCount1").innerHTML = cantidad1;
                console.log(cantidad1)
            }
            break;
        case 1:
            if (action == 0) {
                cantidad2++;
                tot += 100;
                document.getElementById("artCount2").innerHTML = cantidad2;
                console.log(cantidad2)
            } else if (action == 1 && cantidad2 > 0) {
                cantidad2--;
                tot -= 100;
                document.getElementById("artCount2").innerHTML = cantidad2;
                console.log(cantidad2)
            }

            break;
        case 2:
            if (action == 0) {
                cantidad3++;
                tot += 185;
                document.getElementById("artCount3").innerHTML = cantidad3;
                console.log(cantidad3)
            } else if (action == 1 && cantidad3 > 0) {
                cantidad3--;
                tot -= 185;
                document.getElementById("artCount3").innerHTML = cantidad3;
                console.log(cantidad3)
            }
            break;
    }
    document.getElementById("total").innerHTML = tot;
    document.getElementById("totalIva").innerHTML = tot*1.16;
}
function genPass(){
    let name = document.getElementById("nombre").value;
    let edad = document.getElementById("edad").value;
    let palab = document.getElementById("txt").value;
    
    let pass="";

    name.split("");
    palab.split("");
    let symbols = /[!-/:-@[-`{-~]/ 
    for(let i =0;i<edad;i++){
        if(i>name.length()){
            x = Math.floor(Math.random() * Math.floor(name.length()));
            pass.concat(name[x]);
        }
        else{
            pass.concat(name[i]);
        }
        if(i>palab.length()){
            j = Math.floor(Math.random() * Math.floor(name.length()));
            pass.concat(palab[j]);
        }
        else{
            pass.concat(palab[j]);
        }
        let num =Math.floor(Math.random() * Math.floor(12));
        pass.concat(symbols[num]);
    }
    document.getElementById("pass").innerHTML = "Tu contraseña es: "+ pass;
    
}