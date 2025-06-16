let form = document.querySelector('#safe')

form.addEventListener('submit', (y) => {
    y.preventDefault()



    const apiKey = 'afa479ffc707b7fc7aa4069aa8c39a20ecd0e7881fe8c369f15629514fd24936';
    const urlToAnalyze = document.querySelector("#url").value;

// 1. Envoie l'URL à VirusTotal
    fetch('https://www.virustotal.com/api/v3/urls', {
        method: 'POST',
        headers: {
            accept: 'application/json',
            'x-apikey': apiKey,
            'content-type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            url: urlToAnalyze
        })
    })
        .then(res => res.json())
        .then(res => {
            const analysisId = res.data.id;
            console.log('Analyse envoyée avec succès. ID :', analysisId);

            // 2. Petite pause pour laisser l’analyse se faire
            return new Promise(resolve => setTimeout(() => resolve(analysisId), 5000));
        })
        .then(analysisId => {
            // 3. Récupère les résultats de l'analyse
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
            console.log('Résultats de l’analyse :', resultData);

            const stats = resultData.data.attributes.stats;
            console.log(`🔍 Résumé : ${stats.harmless} OK / ${stats.malicious} Malicieux / ${stats.suspicious} Suspects`);

            const results = resultData.data.attributes.results;
            console.log('🧪 Résultats par antivirus :');

            for (const engine in results) {
                const { category, result } = results[engine];
                console.log(`- ${engine}: ${category.toUpperCase()} ${result ? `(${result})` : ''}`);
            }

            // 4. Affiche le lien vers la page VirusTotal (bonus)
            // Pour avoir l’ID encodé en base64, tu dois le recalculer :
            const base64Url = btoa(urlToAnalyze).replace(/=+$/, '');
            console.log(`🌐 Voir l’analyse complète : https://www.virustotal.com/gui/url/${base64Url}`);

        })
        .catch(err => {
            console.error('❌ Erreur détectée :', err);
        });

})


