// valores estaticos
let totalVentas = document.getElementById("totven").textContent;
let ventasPortmen69 = document.getElementById("portmen69").textContent;
let ventasPortmay69 = document.getElementById("portmay69").textContent;
let ventasaltpost = document.getElementById("altpost").textContent;
let ventasAltPrepa = document.getElementById("altpre").textContent;
let ventasportpre = document.getElementById("portpre").textContent;
let ventasreno = document.getElementById("reno").textContent;
let ventasftth = document.getElementById("ftth").textContent;
let ventasifi = document.getElementById("ifi").textContent;

// valores a comparar
// progreso total
let progreTotalVentas = document.getElementById("progreTotVen").textContent;
let barraProgreTotalVentas = document.getElementById("BarraProgreTotVen");
let txtProgreTotalVentas = document.getElementById("textProgreTotVen");

progreTotal = (progreTotalVentas*100)/totalVentas;

barraProgreTotalVentas.value = progreTotal;
txtProgreTotalVentas.innerHTML = progreTotal.toFixed(1) + "%";

// progreso portabilidad menor a 69
let progreportmen69 = document.getElementById("progrevenprotmen69").textContent;
let barraProgreportmen69 = document.getElementById("BarraProgrevenprotmen69");
let txtProgreportmen69 = document.getElementById("textProgrevenprotmen69");

progportmen69 = (progreportmen69*100)/ventasPortmen69;

barraProgreportmen69.value = progportmen69;
txtProgreportmen69.innerHTML = progportmen69.toFixed(1) + "%";

// progreso portabilidad mayor a 69
let progreportmay69 = document.getElementById("progrevenprotmay69").textContent;
let barraProgreportmay69 = document.getElementById("BarraProgrevenprotmay69");
let txtProgreportmay69 = document.getElementById("textProgrevenprotmay69");

progportmay69 = (progreportmay69*100)/ventasPortmay69;

barraProgreportmay69.value = progportmay69;
txtProgreportmay69.innerHTML = progportmay69.toFixed(1) + "%";

// progreso altas postpago
let porgrealtpost = document.getElementById("progrevenaltpost").textContent;
let barraporgrealtpost = document.getElementById("Barraprogrevenaltpost");
let txtporgrealtpost = document.getElementById("textprogrevenaltpost");

Paltpostpa = (porgrealtpost*100)/ventasaltpost;

barraporgrealtpost.value = Paltpostpa;
txtporgrealtpost.innerHTML = Paltpostpa.toFixed(1) + "%";

// progreso altas prepago
let progreVentasAltPre = document.getElementById("progrevenaltpre").textContent;
let barraProgreVentasAltPre = document.getElementById("BarraProgreVenAltPre");
let txtProgreVentasAltPre = document.getElementById("textProgreVenAltPre");

altPre = (progreVentasAltPre*100)/ventasAltPrepa;

barraProgreVentasAltPre.value = altPre;
txtProgreVentasAltPre.innerHTML = altPre.toFixed(1) + "%";

// progreso portabilidad prepago
let progreportprepago = document.getElementById("progreportprepa").textContent;
let barraProgreportprepa = document.getElementById("BarraProgreportprepa");
let txtProgreportprepa = document.getElementById("textProgreportprepa");

portprepa = (progreportprepago*100)/ventasportpre;

barraProgreportprepa.value = portprepa;
txtProgreportprepa.innerHTML = portprepa.toFixed(1) + "%";

// progreso renovacion
let progrecentreno = document.getElementById("progrevenrenova").textContent;
let barraProgrecentreno = document.getElementById("BarraProgrevenrenova");
let txtProgrecentreno = document.getElementById("textProgrevenrenova");

proventreno = (progrecentreno*100)/ventasreno;

barraProgrecentreno.value = proventreno;
txtProgrecentreno.innerHTML = proventreno.toFixed(1) + "%";

// progreso fija ftth
let progrefijaftth = document.getElementById("progrevenfijaftth").textContent;
let barraProgrefijaftth = document.getElementById("BarraProgrevenfijaftth");
let txtProgrefijaftth = document.getElementById("textProgrevenfijaftth");

provenfijaftth = (progrefijaftth*100)/ventasftth;

barraProgrefijaftth.value = provenfijaftth;
txtProgrefijaftth.innerHTML = provenfijaftth.toFixed(1) + "%";

// progreso fija ifi
let progrefijaifi = document.getElementById("progrevenfijaifi").textContent;
let barraProgrefijaifi = document.getElementById("BarraProgrevenfijaifi");
let txtProgrefijaifi = document.getElementById("textProgrevenfijaifi");

provenfijaifi = (progrefijaifi*100)/ventasifi;

barraProgrefijaifi.value = provenfijaifi;
txtProgrefijaifi.innerHTML = provenfijaifi.toFixed(1) + "%";

// estilos de cartas
// total

let cardtotal = document.getElementById("cartatotaal");
if (progreTotal >= 0 && progreTotal < 30) {
    cardtotal.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (progreTotal >= 30 && progreTotal < 70) {
    cardtotal.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (progreTotal >= 70 && progreTotal < 100) {
    cardtotal.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (progreTotal >= 100) {
    cardtotal.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// portabilidades menores a 69

let cardPortMen69 = document.getElementById("cartaPortMen69");
if (progportmen69 >= 0 && progportmen69 < 30) {
    cardPortMen69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (progportmen69 >= 30 && progportmen69 < 70) {
    cardPortMen69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (progportmen69 >= 70 && progportmen69 < 100) {
    cardPortMen69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (progportmen69 >= 100) {
    cardPortMen69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// portabilidades mayores a 69

let cardPortMAy69 = document.getElementById("cartaPortMay69");
if (progportmay69 >= 0 && progportmay69 < 30) {
    cardPortMAy69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (progportmay69 >= 30 && progportmay69 < 70) {
    cardPortMAy69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (progportmay69 >= 70 && progportmay69 < 100) {
    cardPortMAy69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (progportmay69 >= 100) {
    cardPortMAy69.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// altas postpago

let cardaltPost = document.getElementById("cartaAltPost");
if (Paltpostpa >= 0 && Paltpostpa < 30) {
    cardaltPost.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (Paltpostpa >= 30 && Paltpostpa < 70) {
    cardaltPost.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (Paltpostpa >= 70 && Paltpostpa < 100) {
    cardaltPost.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (Paltpostpa >= 100) {
    cardaltPost.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// altas prepago

let cardaltPrepa = document.getElementById("cartaAltPre");
if (altPre >= 0 && altPre < 30) {
    cardaltPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (altPre >= 30 && altPre < 70) {
    cardaltPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (altPre >= 70 && altPre < 100) {
    cardaltPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (altPre >= 100) {
    cardaltPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// portabilidad prepago

let cardPortPrepa = document.getElementById("cartaPortPre");
if (portprepa >= 0 && portprepa < 30) {
    cardPortPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (portprepa >= 30 && portprepa < 70) {
    cardPortPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (portprepa >= 70 && portprepa < 100) {
    cardPortPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (portprepa >= 100) {
    cardPortPrepa.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// renovacion

let cardReno = document.getElementById("cartaReno");
if (proventreno >= 0 && proventreno < 30) {
    cardReno.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (proventreno >= 30 && proventreno < 70) {
    cardReno.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (proventreno >= 70 && proventreno < 100) {
    cardReno.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (proventreno >= 100) {
    cardReno.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// ftth

let cardFtth = document.getElementById("cartaFtth");
if (provenfijaftth >= 0 && provenfijaftth < 30) {
    cardFtth.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (provenfijaftth >= 30 && provenfijaftth < 70) {
    cardFtth.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (provenfijaftth >= 70 && provenfijaftth < 100) {
    cardFtth.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (provenfijaftth >= 100) {
    cardFtth.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}

// ifi

let cardIfi = document.getElementById("cartaIfi");

if (provenfijaifi >= 0 && provenfijaifi < 30) {
    cardIfi.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(231, 29, 29);background: #f35252;color: white;";
}
else if (provenfijaifi >= 30 && provenfijaifi < 70) {
    cardIfi.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(253, 250, 89);background: #eff59a;color: black;"
}
else if (provenfijaifi >= 70 && provenfijaifi < 100) {
    cardIfi.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(123, 245, 164);background: #bff8c2;color: black;"
}
else if (provenfijaifi >= 100) {
    cardIfi.style="width: 15%;box-shadow: 6px 6px 10px 1px rgb(59, 240, 119);background: #8af18f;color: black;"
}
