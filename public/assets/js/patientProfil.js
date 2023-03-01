// Ciblage des éléments HTML
let profilPatientInput = document.querySelectorAll("input");
let modifyBtn = document.getElementById('modifyBtn');
let profilPatientInputLastname = profilPatientInput[0].value;
let profilPatientInputFirstname = profilPatientInput[1].value;
let profilPatientInputEmail = profilPatientInput[2].value;
let profilPatientInputPhone = profilPatientInput[3].value;
let profilPatientInputBirthdate = profilPatientInput[4].value;
// cibler l'alert

// Fonctions
// Comparer les valeurs des inputs avant et après les modifications
function inputsValuesStillSame(patient) {
    if (    patient.getAttribute("id") == 'lastname' && profilPatientInputLastname != patient.value
        ||  patient.getAttribute("id") == 'firstname' && profilPatientInputFirstname != patient.value
        ||  patient.getAttribute("id") == 'email' && profilPatientInputEmail != patient.value
        ||  patient.getAttribute("id") == 'phone' && profilPatientInputPhone != patient.value
        ||  patient.getAttribute("id") == 'birthdate' && profilPatientInputBirthdate != patient.value
        ){
            same = false;
        }else{same = true;}
        return same;
}

profilPatientInput.forEach(profilPatient => {
    profilPatient.addEventListener("focus",()=>{
        profilPatient.removeAttribute("readonly");
        profilPatient.classList.add("bg-warning");
        profilPatient.classList.remove("bg-success");
    })
    profilPatient.addEventListener("blur",()=>{
        profilPatient.setAttribute("readonly",'');
        profilPatient.classList.remove("bg-warning");
        if (!inputsValuesStillSame(profilPatient)) {
            profilPatient.classList.add('bg-success');
        }
    })
    profilPatient.addEventListener('change', ()=>{
        if (!inputsValuesStillSame(profilPatient)) {
            modifyBtn.classList.remove('d-none');
        }else{
            modifyBtn.classList.add('d-none');
        }
    })
});


