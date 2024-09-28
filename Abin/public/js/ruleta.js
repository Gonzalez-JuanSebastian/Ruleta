document.addEventListener("DOMContentLoaded", function() {
    var options = ['Obsequio', 'Flete Gratis', 'Obsequio', '+5%', 'Obsequio', '+5%']; // Opciones 
    var colors = ["#E51A2F", "#0052A1", "#D6D6D6"]; // colores
    
    var startAngle = 0;
    var arc = Math.PI / (options.length / 2);
    var spinTimeout = null;
    var spinTime = 0;
    var spinTimeTotal = 0;
    var ctx;

    // Asigna el evento de clic al botón de girar
    document.getElementById("spin").addEventListener("click", spin);

    // Devuelve el color según el índice
    function getColor(item) {
        return colors[item % colors.length];
    }

    // Dibuja la ruleta
    function drawRouletteWheel() {
        var canvas = document.getElementById("canvas");
        if (canvas.getContext) {
            var outsideRadius = 200;
            var textRadius = 160;
            var insideRadius = 50;

            ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, 500, 500);

            ctx.strokeStyle = "black";
            ctx.lineWidth = 2;

            ctx.font = 'bold 20px Helvetica, Arial';

            // Dibuja cada segmento de la ruleta
            for (var i = 0; i < options.length; i++) {
                var angle = startAngle + i * arc;
                ctx.fillStyle = getColor(i, options.length);

                ctx.beginPath();
                ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
                ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
                ctx.stroke();
                ctx.fill();

                ctx.save();

                ctx.fillStyle = "black";
                ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius,
                    250 + Math.sin(angle + arc / 2) * textRadius);
                ctx.rotate(angle + arc / 2 + Math.PI / 2);
                var text = options[i];
                ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
                ctx.restore();
            }

            // Dibuja la flecha de la ruleta
            ctx.fillStyle = "black";
            ctx.beginPath();
            ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
            ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
            ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
            ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
            ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
            ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
            ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
            ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
            ctx.fill();
        }
    }

    // Inicia el giro de la ruleta
    function spin() {
        spinAngleStart = Math.random() * 20 + 20;
        spinTime = 0;
        spinTimeTotal = Math.random() * 3 + 4 * 2000;
        rotateWheel();
    }

    // Rota la ruleta
    function rotateWheel() {
        spinTime += 30;
        if (spinTime >= spinTimeTotal) {
            stopRotateWheel();
            return;
        }
        var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
        startAngle += (spinAngle * Math.PI / 180);
        drawRouletteWheel();
        spinTimeout = setTimeout(rotateWheel, 30);
    }
    
    // Detiene la rotación de la ruleta
    function stopRotateWheel() {
        clearTimeout(spinTimeout);
        var degrees = startAngle * 180 / Math.PI + 90;
        var arcd = arc * 180 / Math.PI;
        var index = Math.floor((360 - degrees % 360) / arcd);
        var text = options[index];
    
        // Mostrar el resultado en la ventana modal
        var modal = document.getElementById("myModal");
        var modalText = document.getElementById("modal-text");
        modalText.innerHTML = `<p class="congratulations">FELICIDADES</p>  <p class="result">Resultado: ${text} </p> `;
        modal.style.display = "block";
    
        // También puedes actualizar el div si lo deseas
        document.getElementById("result").innerText = "Resultado: " + text;
    
        // Retornar el resultado
        return text;
    }

    // Función para el easing de la rotación
    function easeOut(t, b, c, d) {
        var ts = (t /= d) * t;
        var tc = ts * t;
        return b + c * (tc + -3 * ts + 3 * t);
    }

    // Código para cerrar la ventana modal
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Inicializa el dibujo de la ruleta
    drawRouletteWheel();

    
});
