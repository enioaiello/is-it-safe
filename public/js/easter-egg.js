const samba = document.querySelector('.samba')
samba.addEventListener('click', function () {
    console.log('hello')
    samba.classList.add("spinny")
    setTimeout(() => {
    samba.classList.remove("spinny");
}, 5000);

})