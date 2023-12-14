function showPreview(e) {
    let image = e.files[0];
    let reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("preview").innerHTML = `<img class="previewed" src="${e.target.result}" alt="" class="img-img">`
    };
    reader.readAsDataURL(image);
}