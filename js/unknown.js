const posts = document.querySelectorAll('.post');
const spanPost = document.querySelector('#postNumber');
spanPost.textContent = posts.length;
document.querySelector('#copy p').textContent = `Copyright © ${new Date().getFullYear()}`;