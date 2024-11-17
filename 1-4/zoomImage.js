function zoom(imgId, scale) {
    var img = document.getElementById(imgId);
    if (img) {
        img.style.transform = `scale(${scale})`;
        img.style.transition = "transform 0.3s ease";
    }
}
