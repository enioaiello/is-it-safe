document.addEventListener('DOMContentLoaded', () => {
    let searchbar = document.querySelector('#searchUser');
    let userList = document.querySelector('#userList');

    const fetchUsers = (url) => {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                userList.innerHTML = data.html;
            })
            .catch(error => {
                console.error('Erreur lors de la recherche :', error);
            });
    };

    searchbar.addEventListener('input', () => {
        const query = searchbar.value.trim();

        if (query === '') {
            fetchUsers('/admin/users');
        } else {
            fetchUsers('/admin/search/' + encodeURIComponent(query));
        }
    });
});
