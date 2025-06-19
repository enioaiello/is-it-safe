const newForumButton = document.querySelector('#new-forum-button');
const newForumForm = document.querySelector('#new-forum-form');
const cancelNewForum = document.querySelector('#cancel-new-forum');

newForumButton.addEventListener('click', () => {
    newForumForm.classList.remove('d-none');
    newForumButton.classList.add('d-none');
});

cancelNewForum.addEventListener('click', () => {
    document.querySelector('#title').value = "";
    document.querySelector('#description').value = "";

    newForumForm.classList.add('d-none');
    newForumButton.classList.remove('d-none');
});

newForumForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const title = document.querySelector('#title').value;
    const description = document.querySelector('#description').value;
    const idUser = document.querySelector('#id-user').value;
    const pseudo = document.querySelector('#pseudo').value;

    fetch('/api/new_forum', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            title: title,
            description: description,
            id_user: idUser
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const forumsContainer = document.querySelector('.forums');

                const forumCard = document.createElement('div');
                forumCard.classList.add('card', 'mb-3');
                forumCard.innerHTML = `
            <div class="card-body">
                <h3 class="title"><a href="/forum/${data.forum.id}">${data.forum.title}</a></h3>
                <p class="description">${data.forum.description.length > 150 ? data.forum.description.substring(0, 147) + '...' : data.forum.description}</p>
                <p class="text-muted mb-0">
                    Créé par <strong>${pseudo}</strong> le ${new Date().toLocaleDateString('fr-FR', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                })}
                </p>

                <button data-id-forum="${data.forum.id}" id="edit-forum" onclick="editForum(this)">Edit</button>
                <button data-id-forum="${data.forum.id}" id="delete-forum" onclick="deleteForum(this)">Delete</button>
            </div>
        `;
                forumsContainer.prepend(forumCard);

                newForumForm.classList.add('d-none');
                newForumButton.classList.remove('d-none');
                newForumForm.reset();
            } else {
                alert('Erreur lors de la création du forum.');
            }
        }).catch(error => console.error('Erreur :', error));
});

