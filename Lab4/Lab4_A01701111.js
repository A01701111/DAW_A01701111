function generadorTabla() {
    let val = document.getElementById("genTab").value;
    let tb = "";
    tb = tb.concat("<table>")
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
function genNumAl(){
    //generate numbers
    let num1 = Math.floor(Math.random() * Math.floor(100));
    let num2 = Math.floor(Math.random() * Math.floor(100)); 
    //imprimir los numeros en pantalla
    let nms =  "";
    let sum = num1+num2;
    nms = nms.concat(num1+" "+num2);
    document.getElementById("nums").innerHTML = nms;
    let tm = new Date();
    let inpt = "<input type='number' id='sumNum' placeholder='Enter a number'>";
    document.getElementById("inpNums").innerHTML = inpt;
}