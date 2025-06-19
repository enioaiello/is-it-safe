const deleteButtons = document.querySelectorAll('#delete-comment');

function deleteComment(button) {
    if (confirm('Are you sure you want to delete this comment?')) {
        const idComment = button.dataset.idComment;

        fetch(`/delete/${idComment}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => {
                if (response.ok) {
                    const commentCard = button.closest('.card');
                    if (commentCard) commentCard.remove();
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
    button.addEventListener('click', deleteComment);
});
