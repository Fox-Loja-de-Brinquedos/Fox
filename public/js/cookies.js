document.addEventListener('DOMContentLoaded', function () {
    // Define um cookie para armazenar a preferência do usuário quando aceitar os cookies
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Verifica se o cookie de aceitação de cookies já foi definido
    function getCookie(name) {
        var nameEQ = name + "=";
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1, cookie.length);
            }
            if (cookie.indexOf(nameEQ) === 0) {
                return cookie.substring(nameEQ.length, cookie.length);
            }
        }
        return null;
    }

    // Exibe o pop-up de consentimento de cookies se o cookie não foi definido
    if (!getCookie('cookies_accepted')) {
        document.getElementById('cookie-popup').style.display = 'block';
    }

    // Define o cookie de aceitação de cookies quando o botão for clicado
    document.querySelectorAll('.accept-cookies-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            setCookie('cookies_accepted', 'true', 365);
            document.getElementById('cookie-popup').style.display = 'none';
        });
    });

    // Define o cookie de rejeição de cookies quando o botão for clicado
    document.querySelector('.reject-cookies-btn').addEventListener('click', function () {
        setCookie('cookies_accepted', 'false', 365);
        document.getElementById('cookie-popup').style.display = 'none';
    });

    // Abrir modal quando o link de política de cookies for clicado
    document.getElementById('policy-link').addEventListener('click', function (e) {
        e.preventDefault();
        var policyModal = new bootstrap.Modal(document.getElementById('policy-modal'));
        policyModal.show();
    });
});
