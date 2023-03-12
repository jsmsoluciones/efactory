window.addEventListener('load', function () {
    let cookie = getCookie('toast');
    if (cookie != null) {
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }
})

let getCookie = name => {
    let nameEQ = name + "=";
    let ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,
            c.length);
    }
    return null;
};

const select = document.getElementById('lang')
select.addEventListener('change',
    function () {
        var selectedOption = this.options[select.selectedIndex];
        let exp = Date.now() + 3600 * 365;
        document.cookie = `lang=${selectedOption.value}; expires=${exp}; path=/`;
        location.reload()
    });