
document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('mousemove', handleMouseMove);
        link.addEventListener('mouseleave', handleMouseLeave);
    });

    function handleMouseMove(e) {
        const { offsetX, offsetY, target } = e;
        const { offsetWidth: width, offsetHeight: height } = target;

        const x = (offsetX / width - 0.5) * 20;
        const y = (offsetY / height - 0.5) * 20;

        target.style.transform = `translate(${x}px, ${y}px)`;
    }

    function handleMouseLeave(e) {
        e.target.style.transform = 'translate(0, 0)';
    }
});
