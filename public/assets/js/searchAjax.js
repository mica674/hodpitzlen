var inputSearch = $("#live_search").val();
var itemsPerPage = $("#itemsPerPage").val();
var numPage = $("#numeroPage").val();
let correction = 0;


function ajax(inputSearch, itemsPerPage, numPage) {
    if (inputSearch != "") {//Si champ de recherche pas vide
        $.ajax({
            url: "/views/clients/livesearch.php",
            method: "POST",
            data: { input: inputSearch, nbItems: itemsPerPage, numPage: numPage },
            success: function (data) {
                let html = '';
                if (data == false) {
                    html = '<h3 class="text-danger text-center mt-3">Pas de correspondance !</h3>'
                    $("#searchNoResult").html(html);
                    $("#searchNoResult").css("display", "");
                    $("#patientsList").css("display", "none");
                    $("#searchResult").css("display", "none");
                    $("#nbResults").css("display", "none");

                } else {
                    console.log(data);
                    let results = JSON.parse(data);
                    let nbLine = 1;
                    const options = { month: "long" }; //Option pour la récupération du mois dans le formattage de la date

                    jQuery.each(results[0], function (key, value) {
                        // Formattage de la date de naissance
                        let dateBirthdate = new Date(value.birthdate); //Créer un objet avec la date birthdate
                        let day = dateBirthdate.getDate();
                        day = day < 10 ? '0' + day : day;//Si jour inférieur à 10 on ajoute le 0 avant le chiffre
                        let month = new Intl.DateTimeFormat("fr-FR", options).format(dateBirthdate);//Get le mois
                        let year = dateBirthdate.getFullYear(); //Get l'année
                        let birthdate = `${day} ${month} ${year}` //Concaténer la date complète

                        // Création du html de chaque ligne avec les informations de chaque patient
                        html += `<tr class="my-3 trPatient${(nbLine % 2) + 1} ">
                            <td class=""><a href="/EditPatient?id= ${value.id}"><i class="fa-regular fa-user"></i></a> ${value.lastname}</td>
                            <td class=""><a href="/EditPatient?id= ${value.id}"><i class="fa-regular fa-user"></i></a> ${value.firstname}</td>
                            <td class="text-center"><a href="mailto: ${value.email}"><i class="fa-regular fa-envelope"></i></a></td>
                            <td class="text-center"><a href="tel: ${value.phone}"> ${value.phone}</a></td>
                            // <td class="text-center">${birthdate}</td>
                            <td class="text-center"><a href="/EditPatient?id= ${value.id}"><i class="fa-solid fa-pen"></i></a> &emsp; <a href="/DeletePatient?id= ${value.id}"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>`
                        nbLine++;
                    });
                    // Ecrire le tableau de résultat de la recherche
                    $("#searchResult").html(html);
                    // Ecrire le nombre de page
                    if (results[1][0].maxipage % itemsPerPage != 0) { correction = 1 }
                    let maxipage = Math.floor(results[1][0].maxipage / itemsPerPage) + correction;
                    $("#numeroPageMax").val(maxipage);
                    // Ecrire le nombre de résultats de la recherche (même si le champ est vide)
                    let nbResult;

                    if (results[1][0].maxipage <= 1) {
                        nbResult = results[1][0].maxipage + ' patient';
                    } else { nbResult = results[1][0].maxipage + ' patients' }
                    $("#nbResults").html(nbResult);
                    // Afficher/Masquer les éléments
                    $("#searchResult").css("display", "");
                    $("#patientsList").css("display", "none");
                    $("#searchNoResult").css("display", "none");
                }
            }
        });
    } else {
        // Afficher/Masquer les éléments
        $("#patientsList").css("display", "");
        $("#searchResult").css("display", "none");
        $("#searchNoResult").css("display", "none");
    }
}

function paginationMax(inputSearch) {
    $.ajax({
        url: "/views/clients/pagination.php",
        method: "POST",
        data: { input: inputSearch },
        success: function (data) {
            let result = JSON.parse(data);
            if (result[0].maxipage % itemsPerPage != 0) { correction = 1 }
            let maxipage = Math.floor(result[0].maxipage / itemsPerPage) + correction;
            $("#numeroPageMax").val(maxipage);
            console.log(result[0], itemsPerPage);
            $("#nbResults").html(result[0].maxipage + ' patients');
        }
    });
}
// Executer qu'une fois au chargement de la page
paginationMax('');

$(document).ready(function () {
    $("#live_search").keyup(function () {
        var inputSearch = $("#live_search").val();
        if (inputSearch == '') {inputSearch = ' ';}
        var itemsPerPage = $("#itemsPerPage").val();
        var numPage = $("#numeroPage").val();
        ajax(inputSearch, itemsPerPage, numPage);
    });
    $(".liveSearch").change(function () {
        var inputSearch = $("#live_search").val();
        if (inputSearch == '') {inputSearch = ' ';}
        var itemsPerPage = $("#itemsPerPage").val();
        var numPage = $("#numeroPage").val();
        ajax(inputSearch, itemsPerPage, numPage);
    });
    // Calcul du nombre maximum de résultat
})
