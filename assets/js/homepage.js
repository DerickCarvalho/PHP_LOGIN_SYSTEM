document.getElementById('modify-theme').addEventListener('click', () => {
    let theme = document.getElementById('theme').value;

    window.location.href = `./backend/modifyTheme.php?theme=${theme}`;
});

document.getElementById('logout').addEventListener('click', () => {
    let escolha = confirm('Tem certeza que deseja deslogar-se?');

    if (escolha) {
        window.location.href = `./backend/logout.php`;
    }
});