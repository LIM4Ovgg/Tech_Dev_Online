const themes = {
    light: {
        background: 'white',
        color: 'black',
    },
    dark: {
        background: 'black',
        color: 'white',
    }
};

const checkbox = document.querySelector("#chk");

function setTheme(newTheme) {
    const themeColors = themes[newTheme]; // Seleciona o tema para aplicar

    Object.keys(themeColors).map(function () {
        document.body.className = (newTheme); // Altera a classe do body
    });


    localStorage.setItem('theme', newTheme); //Salva o tema escolhido no localStorage
}

const darkModeToggle = document.querySelector('input[name=theme]');
darkModeToggle.addEventListener('change', function ({ target }) {
    setTheme(target.checked ? 'dark' : 'light');
});

const theme = localStorage.getItem('theme');
if (theme) {
    setTheme(theme)
}

if (theme == 'light') {
    checkbox.checked = false;
} else if (theme == 'dark') {
    checkbox.checked = true;
}