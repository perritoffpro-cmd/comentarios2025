<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>🎁 Recompensas - Turismo Quest</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { font-family: 'Press Start 2P', cursive; background: radial-gradient(circle at top, #1a1a40, #000); color: white; }
    #languageSelect { position:absolute; top:10px; right:20px; background: rgba(0,0,0,0.6); color:white; border:none; padding:5px 10px; border-radius:5px; z-index:3; }
</style>
</head>
<body>
<select id="languageSelect">
    <option value="es">Español</option>
    <option value="qu">Quechua</option>
    <option value="en">English</option>
</select>

<div class="container mt-5">
    <h3 id="rewardsTitle">Recompensas Obtenidas</h3>
    <ul class="list-group mt-3">
        <li class="list-group-item bg-dark text-white" id="reward1">Foto del Parque Nacional Tingo María</li>
        <li class="list-group-item bg-dark text-white" id="reward2">Historia de Kotosh en audio</li>
        <li class="list-group-item bg-dark text-white" id="reward3">Receta típica de la región</li>
        <li class="list-group-item bg-dark text-white" id="reward4">Sticker coleccionable de La Bella Durmiente</li>
    </ul>
</div>

<script>
const translations = {
    es: {
        rewardsTitle: "Recompensas Obtenidas",
        reward1: "Foto del Parque Nacional Tingo María",
        reward2: "Historia de Kotosh en audio",
        reward3: "Receta típica de la región",
        reward4: "Sticker coleccionable de La Bella Durmiente"
    },
    qu: {
        rewardsTitle: "Qispikuna Qhapaq",
        reward1: "Tingo María Llaqta rikhuykuna",
        reward2: "Kotosh historia audio",
        reward3: "Runtu qispikuna",
        reward4: "La Bella Durmiente sticker qispikuna"
    },
    en: {
        rewardsTitle: "Rewards Obtained",
        reward1: "Photo of Tingo María National Park",
        reward2: "Kotosh story in audio",
        reward3: "Typical regional recipe",
        reward4: "Collectible sticker of La Bella Durmiente"
    }
};

const languageSelect = document.getElementById('languageSelect');
languageSelect.addEventListener('change', () => {
    const lang = languageSelect.value;
    Object.keys(translations[lang]).forEach(id => {
        document.getElementById(id).textContent = translations[lang][id];
    });
});
</script>
</body>
</html>
