const accordionModule = (() => {
    return {
        toggleMenu: (id) => {
            const checkBox = document.getElementById(id);
            checkBox.checked = !checkBox.checked
            console.log(checkBox.checked)
        }
    }
})();
