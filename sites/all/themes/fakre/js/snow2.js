document.addEventListener("DOMContentLoaded", function(event) {
    iProDevSnow();
});

// iProDevSnow Christmas! \o/
var iProDevSnow = function() {

    (function() {
        var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
            };
        window.requestAnimationFrame = requestAnimationFrame;
    })();

    var flakes = [],
        canvas = document.getElementById("xmas"),
        ctx = canvas.getContext("2d"),
        parent = canvas.parentNode,
        retina = window.devicePixelRatio,
        flakeCount = parent.offsetWidth < 767 ? 125 : 450,
        mX = -200,
        mY = -200;

    canvas.width = parent.offsetWidth * retina;
    canvas.height = parent.offsetHeight * retina;

    function snowFrame() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (var i = 0; i < flakeCount; i++) {
            var flake = flakes[i],
                x = mX,
                y = mY,
                minDist = 200 * retina,
                x2 = flake.x,
                y2 = flake.y;

            var dist = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y)),
                dx = x2 - x,
                dy = y2 - y;

            if (dist < minDist) {
                var force = minDist / (dist * dist),
                    xcomp = (x - x2) / dist * retina,
                    ycomp = (y - y2) / dist * retina,
                    deltaV = force / 2 * retina;

                flake.velX -= deltaV * xcomp;
                flake.velY -= deltaV * ycomp;
            } else {
                flake.velX *= .98;
                if (flake.velY <= flake.speed) {
                    flake.velY = flake.speed
                }
                flake.velX += Math.cos(flake.step += .05) * flake.stepSize;
            }

            ctx.fillStyle = "rgba(255,255,255," + flake.opacity + ")";
            flake.y += flake.velY;
            flake.x += flake.velX;

            if (flake.y >= canvas.height || flake.y <= 0) {
                reset(flake);
            }

            if (flake.x >= canvas.width || flake.x <= 0) {
                reset(flake);
            }

            ctx.beginPath();
            ctx.arc(flake.x, flake.y, flake.size, 0, Math.PI * 2);
            ctx.fill();
        }
        requestAnimationFrame(snowFrame);
    };

    function reset(flake) {
        flake.x = Math.floor(Math.random() * canvas.width);
        flake.y = 0;
        flake.size = ((Math.random() * 3) + getRandomInt(2, 4)) * retina;
        flake.speed = ((Math.random() * 1) + 0.2) * retina;
        flake.velY = flake.speed;
        flake.velX = 0;
        flake.opacity = (Math.random() * 0.5) + 0.4;
    }

    function init() {
        for (var i = 0; i < flakeCount; i++) {
            var x = Math.floor(Math.random() * canvas.width),
                y = Math.floor(Math.random() * canvas.height),
                size = ((Math.random() * 3) + getRandomInt(2, 4)) * retina,
                speed = ((Math.random() * 1) + 0.2) * retina,
                opacity = (Math.random() * 0.5) + 0.4;

            flakes.push({
                speed: speed,
                velY: speed,
                velX: 0,
                x: x,
                y: y,
                size: size,
                stepSize: (Math.random()) / 30,
                step: 0,
                opacity: opacity
            });
        }

        snowFrame();
    };

    canvas.addEventListener("mouseenter", function() {
        canvas.addEventListener("mousemove", function(e) {
            mX = (e.pageX - canvas.offsetLeft) * retina,
                mY = (e.pageY - canvas.offsetTop) * retina;
        });
    });

    canvas.addEventListener("mouseleave", function() {
        canvas.removeEventListener("mousemove");
        mX = -300,
            mY = -300;
    });

    window.addEventListener("resize", function() {
        canvas.width = parent.offsetWidth * retina;
        canvas.height = parent.offsetHeight * retina;
    });

    init();
};
// Returns a random integer between min (included) and max (excluded)
// Using Math.round() will give you a non-uniform distribution!
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}