function calculateSafetyPercentage(stats) {
    let safetyPercentage = 100;

    const harmless = stats.harmless;
    const suspicious = stats.suspicious;
    const malicious = stats.malicious;

    let suspiciousPenalty = 3 + Math.min(suspicious, 10);
    let maliciousPenalty = 10 + Math.min(malicious, 20);

    for (let i = 0; i < suspicious; i++) {
        safetyPercentage -= suspiciousPenalty;
    }

    for (let i = 0; i < malicious; i++) {
        safetyPercentage -= maliciousPenalty;
    }

    return Math.max(0, Math.round(safetyPercentage));
}

document.addEventListener('DOMContentLoaded', () => {
    const urlToAnalyze = document.querySelector('#url').textContent.trim();
    const apiKey = 'afa479ffc707b7fc7aa4069aa8c39a20ecd0e7881fe8c369f15629514fd24936';
    const resultsDiv = document.querySelector('.results');
    const progressBar = document.querySelector('.safety-percentage');
    const safetyPercentageElement = document.querySelector('.safety-percentage');
    const resultList = document.querySelector('#result-list');
    const fullReportLink = document.querySelector('#full-report');

    fetch('https://www.virustotal.com/api/v3/urls', {
        method: 'POST',
        headers: {
            accept: 'application/json',
            'x-apikey': apiKey,
            'content-type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ url: urlToAnalyze })
    })
        .then(res => res.json())
        .then(res => {
            const analysisId = res.data.id;
            console.log('Analyse envoyée avec succès. ID :', analysisId);
            return new Promise(resolve => setTimeout(() => resolve(analysisId), 5000));
        })
        .then(analysisId => {
            return fetch(`https://www.virustotal.com/api/v3/analyses/${analysisId}`, {
                method: 'GET',
                headers: {
                    accept: 'application/json',
                    'x-apikey': apiKey
                }
            });
        })
        .then(res => res.json())
        .then(resultData => {
            const stats = resultData.data.attributes.stats;
            const safetyPercentage = calculateSafetyPercentage(stats);

            // Met à jour le texte
            safetyPercentageElement.textContent = `${safetyPercentage}%`;

            // Met à jour le cercle
            const progressCircle = document.getElementById('circular-progress');
            const angle = (safetyPercentage / 100) * 360;
            let color = '#198754'; // green (success)

            if (safetyPercentage < 70) color = '#ffc107'; // warning
            if (safetyPercentage < 40) color = '#dc3545'; // danger

            progressCircle.style.background = `conic-gradient(${color} ${angle}deg,#dcdcdc ${angle}deg)`;


            safetyPercentageElement.textContent = `${safetyPercentage}%`;
            console.log(stats)
            document.querySelector('.result').textContent = `🔍 Résumé : ${stats.harmless} inoffensive / ${stats.suspicious} Suspects / ${stats.malicious} Malicieux`;

            const results = resultData.data.attributes.results;
            const engines = Object.keys(results);
            console.log('🧪 Résultats par antivirus :');

            // Affiche 10 résultats max au départ
            engines.forEach((engine, index) => {
                const { category, result } = results[engine];
                const newResult = document.createElement('li');
                newResult.classList.add('list-group-item', 'result-item');
                newResult.textContent = `${engine}: ${category.toUpperCase()} ${result ? `(${result})` : ''}`;

                if (index >= 10) {
                    newResult.classList.add('d-none', 'extra-result');
                }

                if (result) {
                    switch (result.toLowerCase()) {
                        case 'clean':
                            newResult.classList.add('bg-success', 'text-white');
                            break;
                        case 'suspicious':
                            newResult.classList.add('bg-warning-subtle', 'text-dark');
                            break;
                        case 'phishing':
                            newResult.classList.add('bg-warning', 'text-dark');
                            break;
                        case 'malicious':
                            newResult.classList.add('bg-danger', 'text-white');
                            break;
                        case 'unrated':
                            newResult.classList.add('bg-secondary', 'text-white');
                            break;
                        default:
                            newResult.classList.add('bg-light');
                    }
                } else {
                    newResult.classList.add('bg-light', 'text-muted');
                }

                resultList.appendChild(newResult);
            });

            // S’il y a plus de 5, montre le bouton "Voir plus"
            if (engines.length > 5) {
                document.querySelector('#show-more').classList.remove('d-none');
            }


            const base64Url = btoa(urlToAnalyze).replace(/=+$/, '');
            fullReportLink.href = `https://www.virustotal.com/gui/url/${base64Url}`;
            console.log(`🌐 Voir l’analyse complète : https://www.virustotal.com/gui/url/${base64Url}`);
        })
        .catch(err => {
            console.error('❌ Erreur détectée :', err);
        });
});

const showMoreButton = document.querySelector('#show-more');
let expanded = false;

showMoreButton.addEventListener('click', () => {
    const extraItems = document.querySelectorAll('.extra-result');

    expanded = !expanded;

    extraItems.forEach(el => {
        el.classList.toggle('d-none', !expanded);
    });

    showMoreButton.textContent = expanded ? 'Voir moins' : 'Voir plus';
});
