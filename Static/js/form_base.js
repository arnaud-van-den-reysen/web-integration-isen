
/* * * * * * * * * * * * * * * * * *
 * Show/hide fields conditionally
 * * * * * * * * * * * * * * * * * */
function slidervalue() {
    var slider = document.getElementById('slider');
    var slider2 = document.getElementById('slider2');
    var slider3 = document.getElementById('slider3');
    var slider4 = document.getElementById('slider4');

    var output = document.getElementById('slider_value');
    var output2 = document.getElementById('slider_value2');
    var output3 = document.getElementById('slider_value3');
    var output4 = document.getElementById('slider_value4');


    if (output !== 'undefined' && slider !== 'undefined') {
        // the variable is defined
        output.innerHTML = slider.value;
    }

    if (output2 !== 'undefined' && slider2 !== 'undefined') {
        // the variable is defined
        output2.innerHTML = slider2.value;
    }

    if (output3 !== 'undefined' && slider3 !== 'undefined') {
        output3.innerHTML = slider3.value;
    }

    if (output4 !== 'undefined' && slider4 !== 'undefined') {
        output4.innerHTML = slider4.value;
    }
}

// Print the correct form dynamically
// and redirect
function form() {

    var form = document.getElementById('First_symptom');
    var First_symptom = form.options[form.selectedIndex].value;

    if (First_symptom === "1") {
        window.location = "pages/symptom_anxiety.php";
    } else if (First_symptom === "2") {
        window.location = "pages/symptom_armpain.php";
    } else if (First_symptom === "3") {
        window.location = "pages/symptom_backpain.php";
    } else if (First_symptom === "4") {
        window.location = "pages/symptom_breathingdifficulty.php";
    } else if (First_symptom === "5") {
        window.location = "pages/symptom_chills.php";
    } else if (First_symptom === "6") {
        window.location = "pages/symptom_cough.php";
    } else if (First_symptom === "7") {
        window.location = "pages/symptom_delusions.php";
    } else if (First_symptom === "8") {
        window.location = "pages/symptom_diarrhea.php";
    } else if (First_symptom === "9") {
        window.location = "pages/symptom_distendedbelly.php";
    } else if (First_symptom === "10") {
        window.location = "pages/symptom_earpain.php";
    } else if (First_symptom === "11") {
        window.location = "pages/symptom_fatigue.php";
    } else if (First_symptom === "12") {
        window.location = "pages/symptom_fever.php";
    } else if (First_symptom === "13") {
        window.location = "pages/symptom_flatulence.php";
    } else if (First_symptom === "14") {
        window.location = "pages/symptom_headache.php";
    } else if (First_symptom === "15") {
        window.location = "pages/symptom_nausea.php";
    } else if (First_symptom === "16") {
        window.location = "pages/symptom_neckpain.php";
    } else if (First_symptom === "17") {
        window.location = "pages/symptom_nosebleed.php";
    } else if (First_symptom === "18") {
        window.location = "pages/symptom_permanentthirst.php";
    } else if (First_symptom === "19") {
        window.location = "pages/symptom_stomachache.php";
    } else if (First_symptom === "20") {
        window.location = "pages/symptom_sweat.php";
    } else if (First_symptom === "21") {
        window.location = "pages/symptom_tremor.php";
    } else if (First_symptom === "22") {
        window.location = "pages/symptom_tremor.php";
    }
}
function form2() {

    var form = document.getElementById('Second_symptom');
    var Second_symptom = form.options[form.selectedIndex].value;

    if (Second_symptom === "1") {
        window.location = "../pagesLevel2/symptom_anxiety.php";
    } else if (Second_symptom === "2") {
        window.location = "../pagesLevel2/symptom_armpain.php";
    } else if (Second_symptom === "3") {
        window.location = "../pagesLevel2/symptom_backpain.php";
    } else if (Second_symptom === "4") {
        window.location = "../pagesLevel2/symptom_breathingdifficulty.php";
    } else if (Second_symptom === "5") {
        window.location = "../pagesLevel2/symptom_chills.php";
    } else if (Second_symptom === "6") {
        window.location = "../pagesLevel2/symptom_cough.php";
    } else if (Second_symptom === "7") {
        window.location = "../pagesLevel2/symptom_delusions.php";
    } else if (Second_symptom === "8") {
        window.location = "../pagesLevel2/symptom_diarrhea.php";
    } else if (Second_symptom === "9") {
        window.location = "../pagesLevel2/symptom_distendedbelly.php";
    } else if (Second_symptom === "10") {
        window.location = "../pagesLevel2/symptom_earpain.php";
    } else if (Second_symptom === "11") {
        window.location = "../pagesLevel2/symptom_fatigue.php";
    } else if (Second_symptom === "12") {
        window.location = "../pagesLevel2/symptom_fever.php";
    } else if (Second_symptom === "13") {
        window.location = "../pagesLevel2/symptom_flatulence.php";
    } else if (Second_symptom === "14") {
        window.location = "../pagesLevel2/symptom_headache.php";
    } else if (Second_symptom === "15") {
        window.location = "../pagesLevel2/symptom_nausea.php";
    } else if (Second_symptom === "16") {
        window.location = "../pagesLevel2/symptom_neckpain.php";
    } else if (Second_symptom === "17") {
        window.location = "../pagesLevel2/symptom_nosebleed.php";
    } else if (Second_symptom === "18") {
        window.location = "../pagesLevel2/symptom_permanentthirst.php";
    } else if (Second_symptom === "19") {
        window.location = "../pagesLevel2/symptom_stomachache.php";
    } else if (Second_symptom === "20") {
        window.location = "../pagesLevel2/symptom_sweat.php";
    } else if (Second_symptom === "21") {
        window.location = "../pagesLevel2/symptom_tremor.php";
    } else if (Second_symptom === "22") {
        window.location = "../pagesLevel2/symptom_tremor.php";
    }
}

window.addEventListener("load", function () {
    window.document.querySelector("#btn_symptom_1").addEventListener("click", form);

});
window.addEventListener("load", function () {
    window.document.querySelector("#btn_symptom_2").addEventListener("click", form2);

});
