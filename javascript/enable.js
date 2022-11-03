/*let exp = document.getElementById('expediteur');
let sousexp = document.getElementById('sexpediteur');

exp.addEventListener('keypress',()=>{
    if(sousexp.hasAttributes())
    {
        sousexp.removeAttribute('disabled');
    }
});
*/

//disable reference expediteur textbox
function typeCourrier() {
    let refexp = document.getElementById("refexp");
    let dropdown = document.getElementById("typecourrier");
    let str = dropdown.value;

    if (str === "Entrant") {
        if (refexp.hasAttributes()) {
            refexp.removeAttribute("disabled");
        }
    } else if (str === "Sortant") {
        refexp.setAttribute("disabled", "true");
    }
}

//
