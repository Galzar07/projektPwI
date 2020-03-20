const slideList = ["images/zdj1.jpg", "images/zdj2.jpg", "images/zdj3.jpg", "images/zdj4.jpg"];

const image = document.querySelector('.changeImg');
const time = 3000;
let active = 0;

const btnSig = document.querySelectorAll('.signIn');
const divActive = document.querySelectorAll('.loginContent');
let flags = [false, false];


const c = document.querySelector('#copy p');
c.textContent = `Copyright © ${new Date().getFullYear()}`;

const inputs = document.querySelectorAll(".input");


function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});


const changeSlide = () => {
    active++;
    if (active === slideList.length) {
        active = 0;
    }
    image.src = slideList[active];
}


btnSig.forEach((btn, index) => btn.addEventListener('click', () => {
    if (!flags[index]) {
        for (let i = 0; i < divActive.length; i++) {
            if (i != index) {
                divActive[i].style.display = 'none';
            }
            if (flags[i] === true && i != index) {
                flags[i] = !flags[i];
            }
        }
        divActive[index].style.display = 'block';

        flags[index] = !flags[index];
    } else {
        divActive[index].style.display = 'none';
        flags[index] = !flags[index];
    }


}))
setInterval(changeSlide, time);