document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
    var popup = document.createElement("div");
    popup.innerHTML = "Right-click isn't allowed";
    popup.style.position = "fixed";
    popup.style.bottom = "50px";
    popup.style.left = "50%";
    popup.style.transform = "translate(-50%, -50%)";
    popup.style.width = "200px";
    popup.style.zIndex = '100';
    popup.style.borderRadius = "10px";
    popup.style.textAlign = "center";
    popup.style.padding = "15px";
    popup.style.background = "#fff";
    popup.style.border = "1px solid #ccc";
    popup.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
    document.body.appendChild(popup);
    setTimeout(function () {
        popup.parentNode.removeChild(popup);
    }, 3000);
}, false);


document.addEventListener("copy", function (e) {
    e.preventDefault();
    var popup = document.createElement("div");
    popup.innerHTML = "Copying isn't allowed";
    popup.style.position = "fixed";
    popup.style.zIndex = '100';
    popup.style.bottom = "50px";
    popup.style.left = "50%";
    popup.style.borderRadius = "10px";
    popup.style.textAlign = "center";
    popup.style.transform = "translate(-50%, -50%)";
    popup.style.padding = "15px";
    popup.style.width = "200px";
    popup.style.background = "#fff";
    popup.style.border = "1px solid #ccc";
    popup.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
    document.body.appendChild(popup);
    setTimeout(function () {
        popup.parentNode.removeChild(popup);
    }, 3000);
}, false);


document.addEventListener("paste", function (e) {
    e.preventDefault();
    var popup = document.createElement("div");
    popup.innerHTML = "Pasting isn't allowed";
    popup.style.position = "fixed";
    popup.style.zIndex = '100';
    popup.style.bottom = "50px";
    popup.style.left = "50%";
    popup.style.borderRadius = "10px";
    popup.style.textAlign = "center";
    popup.style.transform = "translate(-50%, -50%)";
    popup.style.padding = "15px";
    popup.style.width = "200px";
    popup.style.background = "#fff";
    popup.style.border = "1px solid #ccc";
    popup.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
    document.body.appendChild(popup);
    setTimeout(function () {
        popup.parentNode.removeChild(popup);
    }, 3000);
}, false);




document.addEventListener("cut", function (e) {
    e.preventDefault();
    var popup = document.createElement("div");
    popup.innerHTML = "Cutting isn't allowed";
    popup.style.position = "fixed";
    popup.style.zIndex = '100';
    popup.style.bottom = "50px";
    popup.style.left = "50%";
    popup.style.borderRadius = "10px";
    popup.style.textAlign = "center";
    popup.style.transform = "translate(-50%, -50%)";
    popup.style.padding = "15px";
    popup.style.width = "200px";
    popup.style.background = "#fff";
    popup.style.border = "1px solid #ccc";
    popup.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
    document.body.appendChild(popup);
    setTimeout(function () {
        popup.parentNode.removeChild(popup);
    }, 3000);
}, false);


document.addEventListener("keydown", function (e) {
    if (e.key === "F12") {
        e.preventDefault();
        var popup = document.createElement("div");
        popup.innerHTML = "Inspect isn't allowed";
        popup.style.position = "fixed";
        popup.style.zIndex = '100';
        popup.style.bottom = "50px";
        popup.style.left = "50%";
        popup.style.borderRadius = "10px";
        popup.style.textAlign = "center";
        popup.style.transform = "translate(-50%, -50%)";
        popup.style.padding = "15px";
        popup.style.width = "200px";
        popup.style.background = "#fff";
        popup.style.border = "1px solid #ccc";
        popup.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
        document.body.appendChild(popup);
        setTimeout(function () {
            popup.parentNode.removeChild(popup);
        }, 3000);
    }
});