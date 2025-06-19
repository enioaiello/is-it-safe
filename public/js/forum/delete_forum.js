const deleteButtons = document.querySelectorAll('#delete-forum');

function deleteForum(arg) {
    const button = arg instanceof Event ? arg.currentTarget : arg;

    if (confirm('Are you sure you want to delete this forum?')) {
        const idForum = button.dataset.idForum;

        fetch(`/deleteForum/${idForum}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => {
                if (response.ok) {
                    const forumCard = button.closest('.card');
                    if (forumCard) forumCard.remove();
                } else {
                    console.error('Erreur lors de la suppression');
                }
            })
            .catch(error => {
                console.error('Erreur réseau :', error);
            });
    }
}



deleteButtons.forEach(button => {
    button.addEventListener('click', deleteForum);
});
