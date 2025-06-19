const editButtons = document.querySelectorAll('#edit-forum');

function editForum(arg) {
    let button;

    if (arg instanceof Event) {
        button = arg.currentTarget;
    }
    else {
        button = arg;
    }

    const idForum = button.dataset.idForum;
    const cardBody = button.closest('.card-body');

    const titleEl = cardBody.querySelector('.title');
    const descEl = cardBody.querySelector('.description');

    if (cardBody.querySelector('textarea')) return;

    const originalTitle = titleEl.textContent.trim();
    const originalDesc = descEl.textContent.trim();

    titleEl.style.display = 'none';
    descEl.style.display = 'none';
    button.style.display = 'none';

    const titleTextarea = document.createElement('textarea');
    titleTextarea.className = 'form-control mb-2';
    titleTextarea.rows = 1;
    titleTextarea.value = originalTitle;

    const descTextarea = document.createElement('textarea');
    descTextarea.className = 'form-control mb-2';
    descTextarea.rows = 4;
    descTextarea.value = originalDesc;

    const confirmBtn = document.createElement('button');
    confirmBtn.className = 'btn btn-success btn-sm';
    confirmBtn.textContent = 'Confirmer';

    cardBody.insertBefore(titleTextarea, titleEl.nextSibling);
    cardBody.insertBefore(descTextarea, descEl.nextSibling);
    cardBody.insertBefore(confirmBtn, descTextarea.nextSibling);

    confirmBtn.addEventListener('click', () => {
        const updatedTitle = titleTextarea.value.trim();
        const updatedDesc = descTextarea.value.trim();

        if (!updatedTitle || !updatedDesc) {
            alert('Le titre et la description ne peuvent pas être vides.');
            return;
        }

        fetch(`/editForum/${idForum}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ title: updatedTitle, description: updatedDesc })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    titleEl.textContent = updatedTitle;
                    descEl.textContent = updatedDesc;

                    titleTextarea.remove();
                    descTextarea.remove();
                    confirmBtn.remove();

                    titleEl.style.display = '';
                    descEl.style.display = '';
                    button.style.display = '';
                } else {
                    alert('Erreur lors de la modification');
                }
            })
            .catch(() => alert('Erreur réseau'));
    });
}

editButtons.forEach(button => {
    button.addEventListener('click', editForum);
});
