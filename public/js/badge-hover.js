const failure = document.querySelector('.hover-failure')
const trusted = document.querySelector('.hover-trusted')
const encyclopedy = document.querySelector('.hover-encyclopedy')
const moderator = document.querySelector('.hover-mod')
const owner = document.querySelector('.hover-owner')

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

if(moderator != null) {
    moderator.addEventListener('mouseover', (event)=> {
        const moderatorBlock = document.getElementById('mod')
        moderatorBlock.classList.remove('hidden')
        moderator.addEventListener('mouseout', (event)=> {
            const moderatorBlock = document.getElementById('mod')
            moderatorBlock.classList.add('hidden')
        })
    })
}

if(owner != null) {
    owner.addEventListener('mouseover', (event)=> {
        const ownerBlock = document.getElementById('owner')
        ownerBlock.classList.remove('hidden')
        owner.addEventListener('mouseout', (event)=> {
            const ownerBlock = document.getElementById('owner')
            ownerBlock.classList.add('hidden')
        })
    })
}
