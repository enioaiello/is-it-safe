const loader = document.querySelector('.loading-container')
const loaded = document.querySelector('.result-container')
const resultList = document.querySelector('#result-list');
const safetyPercentageElement = document.querySelector('.safety-percentage');
function httpGetAsync(url, callback) {
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", url, true); // true for asynchronous
    xmlHttp.send(null);
}
let email = document.querySelector('.choice')
const url = "https://emailreputation.abstractapi.com/v1/?api_key=df5399adbbb44529a919ff403def9225&email=" + email.textContent

httpGetAsync(url, function(responseText) {
    loader.classList.add('d-none')
    loaded.classList.remove('d-none')
    const data = JSON.parse(responseText);
    console.log("API response:", data);
    // Example: print if email is deliverable
    console.log("Deliverability:", data.email_deliverability.status);

    let score = data.email_quality.score
    const safetyPercentage = score * 100;
    // Met à jour le texte
    safetyPercentageElement.textContent = `${safetyPercentage}%`;
    const progressCircle = document.getElementById('circular-progress');
    const angle = score * 360;
    let color = '#198754'; // green (success)
    if (score < 0.70) color = '#ffc107'; // warning
    if (score < 0.40) color = '#dc3545'; // danger

    progressCircle.style.background = `conic-gradient(${color} ${angle}deg,#dcdcdc ${angle}deg)`;

    resultList.innerHTML = ''
    const emailQuality = data.email_quality;

    for (const key in emailQuality) {
        const newResult = document.createElement('li');
        if (key === 'score') {

        } else {
            newResult.classList.add('list-group-item', 'result-item');
            newResult.innerHTML = key
            if (emailQuality.hasOwnProperty(key)) {
                    if(emailQuality[key] === true)
                    {
                        newResult.classList.add('bg-success', 'text-white');
                    } else if(emailQuality[key] === false) {
                        newResult.classList.add('bg-info', 'text-black');
                    } else {
                        newResult.classList.add('bg-secondary', 'text-white');
                    }
                resultList.appendChild(newResult)
            }
        }
    }

});
