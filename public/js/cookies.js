document.addEventListener('DOMContentLoaded', function () {
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

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

    if (!getCookie('cookies_accepted')) {
        document.getElementById('cookie-popup').style.display = 'block';
    }

    document.querySelectorAll('.accept-cookies-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            setCookie('cookies_accepted', 'true', 365);
            document.getElementById('cookie-popup').style.display = 'none';
        });
    });

    document.querySelector('.reject-cookies-btn').addEventListener('click', function () {
        setCookie('cookies_accepted', 'false', 365);
        document.getElementById('cookie-popup').style.display = 'none';
    });

    document.getElementById('policy-link').addEventListener('click', function (e) {
        e.preventDefault();
        var policyModal = new bootstrap.Modal(document.getElementById('policy-modal'));
        policyModal.show();
    });
});