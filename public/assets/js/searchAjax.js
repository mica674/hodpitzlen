$(document).ready(function () {
    $("#live_search").keyup(function () {
        var inputSearch = $(this).val();
        // alert(input);

        if (inputSearch != "") {//Si champ de recherche pas vide
            $.ajax({
                url: "/views/clients/livesearch.php",
                method: "POST",
                data: { input: inputSearch },
                success: function (data) {
                    let html = '';
                    if (data == false) {
                        html = '<h3 class="text-danger text-center mt-3">Pas de correspondance !</h3>'
                        $("#searchNoResult").html(html);
                        $("#searchNoResult").css("display", "");
                        $("#patientsList").css("display", "");
                        $("#searchResult").css("display", "none");
                    } else {
                        let results = JSON.parse(data);
                        let nbLine = 1;
                        const options = { month: "long" }; //Option pour la récupération du mois dans le formattage de la date

                        jQuery.each(results, function (key, value) {
                            // Formattage de la date de naissance
                            let dateBirthdate = new Date(value.birthdate); //Créer un objet avec la date birthdate
                            let day = dateBirthdate.getDate();
                            day = day < 10 ? '0' + day : day;//Si jour inférieur à 10 on ajoute le 0 avant le chiffre
                            let month = new Intl.DateTimeFormat("fr-FR", options).format(dateBirthdate);//Get le mois
                            let year = dateBirthdate.getFullYear(); //Get l'année
                            let birthdate = `${day} ${month} ${year}` //Concaténer la date complète

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
                        $("#searchResult").html(html);
                        $("#searchResult").css("display", "")
                        $("#patientsList").css("display", "none")
                        $("#searchNoResult").css("display", "none")
                    }

                }
            });
        } else {
            $("#patientsList").css("display", "")
            $("#searchResult").css("display", "none")
            $("#searchNoResult").css("display", "none")
        }
    });
})


$("#resultTest").html(resultTest);

