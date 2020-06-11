const coments = document.querySelectorAll('.comUsers div');
const btn = document.querySelectorAll('.zdjLog button');
const search = document.querySelector('.wyszukiwarka');
const userList = document.querySelectorAll('.post');
const postList = document.querySelector('#leftSect');

function color() {
    coments.forEach((com, index) => {
        if (index % 2 == 0)
            com.style.backgroundColor = '#e6ffff';
        else
            com.style.backgroundColor = '#ffffe6';

    })
}




// const searchUsername = (e) => {
//     const searchText = e.target.value.toLowerCase();
//     console.log(searchText);
//     let users = [...userList];
//     users = users.filter(temp => temp.textContent.toLowerCase().includes(searchText));
//     postList.textContent = '';
//     users.forEach(temp => postList.appendChild(temp));
// }

// btn.forEach((temp) => temp.addEventListener('click', () => {
//     console.log('klik');
//     if (!(temp.classList.contains("czerSerce"))) {
//         temp.classList.add('czerSerce');
//     } else {
//         temp.classList.remove('czerSerce');
//     }
// }))

search.addEventListener('input', searchUsername);

color();