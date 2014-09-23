
/*-----------------------------------------
           script for admin login
           -------------------------------------------*/
        //    $('.dropdown-menu').click(function(e) {
        //     e.stopPropagation();
        // });

/*-----------------------------------------
           vertical left menu
           -------------------------------------------*/
           var isOn = false;
           function showMenu() {
            if (isOn) {
                var top = -550;
                var className = "glyphicon glyphicon-chevron-down"
                isOn = false;
            } else {
                var top = 80;
                var className = "glyphicon glyphicon-chevron-up"
                isOn = true;
            }
            $('#menu').animate({
                width: 200,
                top: top,
                display: 'toggle'
            }, 1500);
            document.getElementById('glyphicon').className = className;
        }

/*-----------------------------------------
           script for login system 
           -------------------------------------------*/
           $(function() {
            var form = $('#connexion-form');
            var loaderSpan = $('#modal_footer');
            var spanColor  = document.getElementById('modal_footer');
            if (form && loaderSpan && spanColor) {
                spanColor.style.color = 'white';
                form.on('submit', function(e){
                    if(form.is('.loading, .loggedIn')){
                        return false;
                    }
                    var email = form.find('input').val(),
                    messageHolder = loaderSpan.find('span.loader');
                    e.preventDefault();
                    $.post(this.action, {email: email}, function(m){
                        if(m.error) {
                            spanColor.style.color = '#c22b3c';
                            loaderSpan.addClass('error');
                            messageHolder.text(m.message);
                        } else {
                            spanColor.style.color = '#2bc259';
                            loaderSpan.removeClass('error').addClass('loggedIn');
                            messageHolder.text(m.message);
                        }
                    });
                });
                $(document).ajaxStart(function(){
                    loaderSpan.addClass('loading');
                });
                $(document).ajaxComplete(function(){
                    loaderSpan.removeClass('loading');
                });
            }
        });

/*-----------------------------------------
    script for checkbox button terms on company form
    -------------------------------------------*/
//     var companyForm = document.getElementById("company-form");
//     if (typeof companyForm !== 'undefined' && companyForm) { 
//         document.addEventListener("DOMContentLoaded", function() {
//             var checkCompanyForm = function(e) {
//               if(!this.terms_company.checked) {
//                 alert("Veuillez accepter les conditions en cochant la case");
//                 this.terms_company.focus();
//         e.preventDefault(); // equivalent to return false
//         return;
//     }
// };
//     // attach the form submit handler

//     companyForm.addEventListener("submit", checkCompanyForm, true);

// }, false);
//     }

/*---------------------------------------------------
    script for checkbox button terms on seeker form
    ---------------------------------------------------*/
    var applicantForm = document.getElementById("applicant-form");
    if (typeof applicantForm !== 'undefined' && applicantForm) { 
        document.addEventListener("DOMContentLoaded", function() {
            var checkApplicantForm = function(e) {
              if(!this.terms_debt.checked) {
                alert("Veuillez accepter les conditions en cochant les trois cases");
                this.terms_debt.focus();
                e.preventDefault(); // equivalent to return false
                return;
            }
            if(!this.terms_funds.checked) {
                alert("Veuillez accepter les conditions en cochant les trois cases");
                this.terms_funds.focus();
                e.preventDefault(); // equivalent to return false
                return;
            }
            if(!this.terms_applicant.checked) {
                alert("Veuillez accepter les conditions en cochant les trois cases");
                this.terms_applicant.focus();
                e.preventDefault(); // equivalent to return false
                return;
            }
        };
        applicantForm.addEventListener("submit", checkApplicantForm, true);
    }, false);
}

if (applicantForm && typeof applicantForm.isEuropean !== 'undefined' && applicantForm.isEuropean) { 
    var radioButton = applicantForm.isEuropean;
    for (var i = 0; i < radioButton.length; ++i) {
        radioButton[i].onclick = function() {
            if (this.value == "oui") {
                document.getElementById('cert-emplt').style.visibility = "hidden";
            } else if (this.value == "non") {
                document.getElementById('cert-emplt').style.visibility = "visible";
            }
        }
    }
}