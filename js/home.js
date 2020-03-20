const coments = document.querySelectorAll('.comUsers div');

function coloring() {
    coments.forEach((com, index) => {
        if (index % 2 == 0)
            com.style.backgroundColor = '#e6ffff';
        else
            com.style.backgroundColor = '#ffffe6';

    })
}

coloring();