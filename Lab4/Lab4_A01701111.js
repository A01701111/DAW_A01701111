function generadorTabla() {
    let val = document.getElementById("genTab").value;
    let tb = "";
    tb = tb.concat("<table><tr><th>Numero</th><th>Cuadrado</th><th>Cubo</th></tr>");
    for (let i = 1; i <= val; i++) {
        //tb=tb.concat("<tr>"+"<td>"+i+"</td>"+"<td>"+i**2+"</td>"+"<td>"+i**3+"</td>"+"</tr>");
        tb = tb.concat("<tr>");
        tb = tb.concat("<td>" + i + "</td>");
        tb = tb.concat("<td>" + i ** 2 + "</td>");
        tb = tb.concat("<td>" + i ** 3 + "</td>");
        tb = tb.concat("</tr>");
    }
    tb = tb.concat("</table>")
    document.getElementById("tb1").innerHTML = tb;
}

function genNumAl() {
    //generate numbers
    let num1 = Math.floor(Math.random() * Math.floor(100));
    let num2 = Math.floor(Math.random() * Math.floor(100));
    //imprimir los numeros en pantalla
    let nms = "";
    nms = nms.concat(num1 + " " + num2);
    document.getElementById("nums").innerHTML = nms;
    let tm = new Date();
    let ans = prompt("Cual es el resultado de la suma de " + num1 + " y " + num2);
    let finalTime = (new Date() - tm) / 1000;
    if (ans == (num1 + num2)) {
        document.getElementById("res").innerHTML = "¡Correcto! La respuesta es " + (num1 + num2) + " y te tardaste " + finalTime + " segundos";
    } else {
        document.getElementById("res").innerHTML = "¡Incorrectote! La respuesta es " + (num1 + num2) + " y te tardaste " + finalTime + " segundos";
    }
}

function counter() {
    let neg = 0,
        zer = 0,
        pos = 0,
        arr = [],
        arrStr = "";
    for (let i = 0; i < 30; i++) {
        let num1 = Math.floor(Math.random() * 100);
        let num2 = Math.floor(Math.random() * 100);
        let pp = (num1 - num2);
        arr[i] = pp;
        switch (true) {
            case (pp < 0):
                neg++;
                break;
            case (pp == 0):
                zer++;
                break;
            case (pp > 0):
                pos++;
        }
        arrStr = arrStr.concat(pp + " ");
    }
    document.getElementById("resCounter").innerHTML = "El arreglo [" + arrStr + "] <br>Tienen:<br> " + neg + " menores a 0<br>" + zer + " ceros<br>" + pos + " Mayores a 0<br>";
}

function promedio() {
    let arr = [],
        rows = 20,
        col = 6,
        promRow = [],
        promSalon = 0;
    for (let i = 0; i < rows; i++) {
        arr[i] = [];
        let totRow = 0;
        for (let j = 0; j < col; j++) {
            //let temp = Math.floor(Math.random() * 100);
            let temp = Math.floor(60 + Math.random() * (100 - 60));
            totRow += temp;
            arr[i][j] = temp;
            if (j == col - 1) {
                promRow[i] = Math.floor(totRow / 6);
                console.log(promRow[i]);
                promSalon += promRow[i];
            }
        }
    }
    promSalon = promSalon / rows;
    promRow.toString();
    document.getElementById("tabAve").innerHTML = "El promedio es " + promSalon + "<br> El promedio por renglon es: [" + promRow + "]";
}
// 5:Función: inverso. Parámetros: Un número. Regresa: El número con sus dígitos en orden inverso.
function inverso() {
    let num = document.getElementById("invNum").value;
    num = num + "";
    let rev = num.split("").reverse("").join("");
    document.getElementById("resInv").innerHTML = "El numero " + num + " invertido es " + rev;
}

function balancedBrackets() {
    let string = document.getElementById("Balan").value;
    const bracketObject = {
        "(": ")",
        "{": "}",
        "[": "]"
    };
    let xx = true;
    const str = [];
    for (let bracket of string) {
        if (bracketObject[bracket]) {
            str.push(bracket);
            console.log(bracket);
        } else {
            const popped = str.pop();
            if (bracketObject[popped] !== bracket) {
                xx = false;
            }
        }
    }
    if (xx == false) {
        document.getElementById("resBal").innerHTML = "No esta balanceado"
    } else {
        document.getElementById("resBal").innerHTML = "Esta balanceado"
    }
}