const formBtn = document.querySelector('#form-btn');
const formMessage = document.querySelector('#form-message')


formBtn.addEventListener('click', ()=>{
    formBtn.classList.add('d-none');
    formMessage.classList.remove('d-none');
})
formMessage.addEventListener('submit', (e) => {
    e.preventDefault();
    const title = document.querySelector('#title').value;
    const message = document.querySelector('#message').value;
    const idUser = document.querySelector('#id_user').value;

    fetch("/add-message", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            title: title,
            message: message,
            id_user: idUser
        })
    })
        .then(res => res.json())
        .then(data => {
            const card = document.createElement('div');
            card.classList.add('card', 'message-card', 'mb-3');
            card.innerHTML = `
            <div class="card-header d-flex align-items-center">
                <img src="image/${data.picture_url}" class="rounded-circle me-3" alt="Photo de ${data.pseudo}" width="50" height="50">
                <div>
                   <h6 class="mb-0">${data.pseudo}</h6>
                   <small>${new Date().toLocaleDateString('fr-FR', {day:'2-digit', month:'2-digit', year:'numeric'})} ${new Date().toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'})}</small>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">${title}</h5>
                <p class="card-text">${message}</p>
            </div>`;

            const container = document.querySelector('#messages-container');
            container.insertBefore(card, container.firstChild);

            document.querySelector('#title').value = "";
            document.querySelector('#message').value = "";

            formBtn.classList.remove('d-none');
            formMessage.classList.add('d-none');

        })
        .catch(error => console.error(error))
})
