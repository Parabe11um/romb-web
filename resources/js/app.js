import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    const banner = document.getElementById("cookie-banner");
    const agreeButton = document.getElementById("cookie-agree-button");

    if (!banner || !agreeButton) return;

    if (document.cookie.includes("cookie_consent=true")) {
        banner.remove();
        return;
    }

    agreeButton.addEventListener("click", function () {
        document.cookie = "cookie_consent=true; path=/; max-age=" + 60 * 60 * 24 * 365;

        try {
            banner.remove();
        } catch (e) {
            banner.style.display = "none";
        }
    });
});
