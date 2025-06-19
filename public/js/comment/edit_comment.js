const editButtons = document.querySelectorAll('#edit-comment');

function editComment(arg) {
    let button;

    // Si appelé avec un événement (addEventListener)
    if (arg instanceof Event) {
        button = arg.currentTarget;
    } else {
        // Si appelé avec this (HTML inline)
        button = arg;
    }

    const idComment = button.dataset.idComment;
    const cardBody = button.closest('.card-body');
    const commentP = cardBody.querySelector('.card-text');

    if (!commentP || cardBody.querySelector('textarea')) return;

    const originalText = commentP.textContent;
    commentP.style.display = 'none';
    button.style.display = 'none';

    const textarea = document.createElement('textarea');
    textarea.className = 'form-control mb-2';
    textarea.value = originalText;

    const confirmBtn = document.createElement('button');
    confirmBtn.className = 'btn btn-success btn-sm';
    confirmBtn.textContent = 'Confirm Edit';

    cardBody.appendChild(textarea);
    cardBody.appendChild(confirmBtn);

    confirmBtn.addEventListener('click', () => {
        const updatedComment = textarea.value;

        fetch(`/edit/${idComment}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ newComment: updatedComment })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    commentP.textContent = updatedComment;
                    textarea.remove();
                    confirmBtn.remove();
                    commentP.style.display = '';
                    button.style.display = '';
                } else {
                    alert('Erreur lors de la modification');
                }
            })
            .catch(() => alert('Erreur réseau'));
    });
}




editButtons.forEach(button => {
    button.addEventListener('click', editComment);
});
