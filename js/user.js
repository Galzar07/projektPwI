const posts = document.querySelectorAll('.post');
const spanPost = document.querySelector('#postNumber');
spanPost.textContent = posts.length;
document.querySelector('#copy p').textContent = `Copyright © ${new Date().getFullYear()}`;



// po wcisnieciu zdjecia na profilu otworzy sie galeria zdj z dodawaniem komentarzy
// const postText = document.querySelectorAll('.postText');
// const listCom = [...document.querySelectorAll('.komentarze')];
// let flag = false;
// posts.forEach((post, index) => post.addEventListener('click', () => {
//     alert('kliknaless');

//     posts[index].lastElementChild.style.display = 'block';
//     posts[index].lastElementChild.style.width = '500px';
//     console.log(posts[index].hasChildNodes('.postText'));
//     console.log(posts[index].childNodes);
//     posts[index].removeChild();
// }))