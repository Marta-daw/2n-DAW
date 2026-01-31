
const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");
const botonBiN = document.getElementById("blancNegre");

let imatgeActual = "src/istockphoto-1343092033-612x612.webp";

function mostrarImatges(photo) {
    const imatge = new Image();
    imatge.onload = function () {

        //ajustar imatge
        canvas.width = this.width;
        canvas.height = this.height;

        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(this, 0, 0);
        imatgeActual = photo;
    };

    imatge.src = photo;
}

mostrarImatges(imatgeActual);

const contenedorCanvas = document.getElementById("container");
if (contenedorCanvas) {
    contenedorCanvas.addEventListener("click", (event) => {
        const apretarImatge = event.target.closest("img");
        if (apretarImatge) {
            const rutaImatge = apretarImatge.getAttribute("src");
            mostrarImatges(rutaImatge);
        }
    });
}


botonBiN.addEventListener("click", () => {
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    const data = imageData.data;

    //PER CONVERTIR UNA IMATGE A ESCALA DE GRISSOS
    for (let i = 0; i < data.length; i += 4) {
        const red = data[i];
        const green = data[i + 1];
        const blue = data[i + 2];

        // Convert to grayscale using luminosity method
        const gray = 0.21 * red + 0.72 * green + 0.07 * blue;

        data[i] = gray;     // Red channel
        data[i + 1] = gray; // Green channel
        data[i + 2] = gray; // Blue channel
        // Alpha channel (data[i + 3]) remains unchanged
    }
    ctx.putImageData(imageData, 0, 0);

});