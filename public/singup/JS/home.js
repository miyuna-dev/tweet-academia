// Sidebar
const menuItems = document.querySelectorAll('.menu-item');

// MESSAGES
const msgNotif = document.querySelector('#messages-notifications');
const msgBox = document.querySelector('.messages');
const msg = msgBox.querySelectorAll('.message');
const msgSearch = document.querySelector('#message-search');

// remove active class from all menu items
const changeActiveItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    })
}

menuItems.forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        changeActiveItem();
        item.classList.add('active');
        if(item.id != 'notifications') {
            document.querySelector('.notifications-popup').
            style.display = 'none';
        } else {
            document.querySelector('.notifications-popup').
            style.display = 'block';
            document.querySelector('#notifications .notification-count').style.display = 'none';
        }
    })
})


// Messages
const searchMsg = () => {
    const val = msgSearch.value.toLowerCase();
    msg.forEach(user => {
        let name = user.querySelector('h5').textContent.toLowerCase();
        if(name.indexOf(val) != -1) {
            user.style.display = 'flex';
        } else {
            user.style.display = 'none';
        }
    })
}

// search chat
msgSearch.addEventListener('keyup', searchMsg);

// highlight box
msgNotif.addEventListener('click', () => {
    msgBox.style.boxShadow = '0 0 1rem var(--clr-primary)';
    msgNotif.querySelector('.notification-count').style.display = 'none';
    setTimeout(() => {
        msgBox.style.boxShadow = 'none';
    }, 2000);
})