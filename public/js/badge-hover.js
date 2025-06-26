const failures = document.querySelectorAll('.hover-failure')
const trusteds = document.querySelectorAll('.hover-trusted')
const encyclopedys = document.querySelectorAll('.hover-encyclopedy')
const moderators = document.querySelectorAll('.hover-mod')
const owners = document.querySelectorAll('.hover-owner')

if(failures != null) {
    failures.forEach((failure) => {
        failure.addEventListener('mouseover', (event)=> {
            const failureBlock = document.getElementById('failure')
            failureBlock.classList.remove('hidden')
            failure.addEventListener('mouseout', (event)=> {
                const failureBlock = document.getElementById('failure')
                failureBlock.classList.add('hidden')
            })
        })
    })
}

if(trusteds != null) {
    trusteds.forEach((trusted) => {
        trusted.addEventListener('mouseover', (event)=> {
            const trustedBlock = document.getElementById('trusted')
            trustedBlock.classList.remove('hidden')
            trusted.addEventListener('mouseout', (event)=> {
                const trustedBlock = document.getElementById('trusted')
                trustedBlock.classList.add('hidden')
            })
        })
    })
}

if(encyclopedys != null) {
    encyclopedys.forEach((encyclopedy) => {
        encyclopedy.addEventListener('mouseover', (event)=> {
            const encyclopedyBlock = document.getElementById('encyclopedy')
            encyclopedyBlock.classList.remove('hidden')
            encyclopedy.addEventListener('mouseout', (event)=> {
                const encyclopedyBlock = document.getElementById('encyclopedy')
                encyclopedyBlock.classList.add('hidden')
            })
        })
    })
}

if(moderators != null) {
    moderators.forEach((moderator) => {
        moderator.addEventListener('mouseover', (event)=> {
            const moderatorBlock = document.getElementById('mod')
            moderatorBlock.classList.remove('hidden')
            moderator.addEventListener('mouseout', (event)=> {
                const moderatorBlock = document.getElementById('mod')
                moderatorBlock.classList.add('hidden')
            })
        })
    })
}

if(owners != null) {
    owners.forEach((owner) => {
        owner.addEventListener('mouseover', (event)=> {
            const ownerBlock = document.getElementById('owner')
            ownerBlock.classList.remove('hidden')
            owner.addEventListener('mouseout', (event)=> {
                const ownerBlock = document.getElementById('owner')
                ownerBlock.classList.add('hidden')
            })
        })
    })
}
