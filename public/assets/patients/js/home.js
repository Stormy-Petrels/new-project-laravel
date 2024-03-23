//Thay đổi màu khi nhấn vào thẻ a
document.querySelectorAll('.menu-1 a').forEach(function(element) {
    element.addEventListener('click', function() {
        this.style.color = '#1CBBD0';
    });
});
