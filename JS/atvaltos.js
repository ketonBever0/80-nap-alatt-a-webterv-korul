function regToBej() {
    //console.log("Működik");
    let regsection = document.getElementById("reg");
    regsection.style.display = "none";

    let bejsection = document.getElementById("bej");
    bejsection.style.display = "block";
}

function bejToReg() {
    let regsection = document.getElementById("reg");
    regsection.style.display = "block";

    let bejsection = document.getElementById("bej");
    bejsection.style.display = "none";
}