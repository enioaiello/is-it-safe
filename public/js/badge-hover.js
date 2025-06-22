const failure = document.querySelector('.hover-failure')
const trusted = document.querySelector('.hover-trusted')
const encyclopedy = document.querySelector('.hover-encyclopedy')

if(failure != null) {
    failure.addEventListener('mouseover', (event)=> {
    const failureBlock = document.getElementById('failure')
    failureBlock.classList.remove('hidden')
    failure.addEventListener('mouseout', (event)=> {
        const failureBlock = document.getElementById('failure')
        failureBlock.classList.add('hidden')
    })
})
}

if(trusted != null) {
    trusted.addEventListener('mouseover', (event)=> {
    const trustedBlock = document.getElementById('trusted')
    trustedBlock.classList.remove('hidden')
    trusted.addEventListener('mouseout', (event)=> {
        const trustedBlock = document.getElementById('trusted')
        trustedBlock.classList.add('hidden')
    })
})
}

if(encyclopedy != null) {
    encyclopedy.addEventListener('mouseover', (event)=> {
    const encyclopedyBlock = document.getElementById('encyclopedy')
    encyclopedyBlock.classList.remove('hidden')
    encyclopedy.addEventListener('mouseout', (event)=> {
        const encyclopedyBlock = document.getElementById('encyclopedy')
        encyclopedyBlock.classList.add('hidden')
    })
}) 
}
