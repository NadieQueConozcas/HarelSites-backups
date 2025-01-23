document.addEventListener("DOMContentLoaded", () => {
    const navigation = document.querySelector('#navigation');

    function toggleNavigation() {
        console.log(window.innerWidth);
        if (window.innerWidth > 1800) {
            navigation.style.visibility = 'visible';

        } else {
            navigation.style.visibility = 'hidden';
        }
    }

    toggleNavigation();
    window.addEventListener('resize', toggleNavigation);
});


document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.navigation-item').forEach((item, index) => {
        const sections = document.querySelectorAll('#main h2');

        item.addEventListener('click', () => {
            const target = sections[index];

            target.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });
            target.style.transition = 'transform 0.3s ease-in-out';

            setTimeout(() => {
                target.style.transform = 'scale(1.03)';
                setTimeout(() => {
                    target.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        target.style.transform = 'scale(1)';
                    }, 200);
                }, 200);

            }, 600);
        });
    });
});