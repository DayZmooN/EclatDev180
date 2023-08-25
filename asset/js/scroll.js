document.addEventListener('DOMContentLoaded', function () {
    let container = document.querySelector('.container-card-student');
    let body = document.body;

    container.addEventListener('scroll', onScroll);
    applyScale();

    function applyScale() {
        if (window.innerWidth < 770) {
            container.style.transform = 'scale(1)';
            body.style.overflow = 'scroll';
            return;
        }

        let scrollRatio = container.scrollTop / (container.scrollHeight - container.clientHeight);
        let scaleValue = 1 + scrollRatio * 0.1;
        container.style.transform = `scale(${scaleValue})`;

        if (container.scrollTop === 0 || container.scrollTop + container.clientHeight >= container.scrollHeight) {
            body.style.overflow = 'auto';
        } else {
            body.style.overflow = 'hidden';
        }
    }

    function onScroll() {
        applyScale();
    }
});
