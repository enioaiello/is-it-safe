const addCommentButton = document.querySelector('#add_comment_button');
const addCommentForm = document.querySelector('#add_comment_form');
function dateToday() {
    const date = new Date();

    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear();

    function getOrdinalSuffix(n) {
        if (n >= 11 && n <= 13) return 'th';
        switch (n % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
            default: return 'th';
        }
    }

    return `${month} ${day}${getOrdinalSuffix(day)} ${year}`;
}
addCommentButton.addEventListener('click', ()=>{
    addCommentButton.classList.add('d-none');
    addCommentForm.classList.remove('d-none');
})

addCommentForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    const newComment = document.querySelector('#new_comment').value;
    const idForum = document.querySelector('#id_forum').value;
    const pseudo = document.querySelector('#pseudo').value;

    fetch(`/api/new_comment/${idForum}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            newComment: newComment
        })
    })
        .then(response => response.json())
        .then(data => {
            const comments = document.querySelector('.comments');
            comments.innerHTML += `
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">${data.comment}</p>
                        <p class="card-subtitle text-muted mb-1">by  <strong>${pseudo} </strong></p>
                        <p class="card-subtitle text-muted"><small>created_at ${dateToday()}</small></p>
                        <button data-id-comment="${data.idComment}" id="edit-comment" onclick="editComment(this)">Edit</button>
                        <button data-id-comment="${data.idComment}" id="delete-comment" onclick="deleteComment(this)">Delete</button>
                    </div>
                </div>`

            document.querySelector('#new_comment').value = "";
        })
        .catch(error => {
            console.error('Error:', error);
        });

    addCommentButton.classList.remove('d-none');
    addCommentForm.classList.add('d-none');
})
