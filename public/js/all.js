var hello = "hello";

var canvas = document.getElementById("canvasElement");
if (canvas && canvas.getContext) {
    var context = canvas.getContext("2d");
    startCanvas();
}
function startCanvas() {
    //add eventlistener to the canvas
    canvas.addEventListener("mousemove", MouseMove, false);
    //call animate every fraction of a second, this controls motion speed
    setInterval(animate, 30);
    canvasSize();
}
var stars = [];
var thisMany =  100; //Math.floor(window.innerWidth / 35);
for (var i = 0; i < thisMany ; i++) {
    stars.push({
        x: Math.random() * window.innerWidth,
        y: Math.random() * window.innerHeight,
        xAnimateBy: (Math.random()*3),
        yAnimateBy: (Math.random()*-3),
        size: 2,
        color: "rgba("+Math.round(Math.random()*150)+",210,202,1)"
    });
}
function animate() {
    context.clearRect(0, 0, window.innerWidth, window.innerHeight);
    context.lineWidth = 0.25;
    for (var n = 0; n < thisMany; n++) {
        stars[n].x += stars[n].xAnimateBy;
        stars[n].y += stars[n].yAnimateBy;
        if (stars[n].x > window.innerWidth) {
            stars[n].xAnimateBy = -1 - Math.random();
        } else if (stars[n].x < 0) {
            stars[n].xAnimateBy = 1 + Math.random();
        }
        if (stars[n].y > window.innerHeight) {
            stars[n].yAnimateBy = (-1 - Math.random());
        } else if (stars[n].y < 0) {
            stars[n].y = window.innerHeight;
        }
        stars.forEach(function(secondObject) {
            var maxDistance = 10000;
            var checkedDistance = Math.pow(secondObject.x - stars[n].x, 2) + Math.pow(secondObject.y - stars[n].y, 2);
            if (checkedDistance < maxDistance){
                maxDistance = checkedDistance;
            }
            if (checkedDistance > maxDistance){
                return maxDistance;
            }
            context.moveTo(stars[n].x, stars[n].y);
            context.quadraticCurveTo(stars[n].x, stars[n].y, secondObject.x, secondObject.y);
            context.strokeStyle = stars[n].color;
            context.stroke();
        });

        var mouseProximity = DistanceBetween(mouseLocation, stars[n]);
        var animationScale = Math.max(Math.min(15 - mouseProximity / 10, 6), 1);
        context.fillStyle = stars[n].color;
        context.beginPath();
        context.arc(stars[n].x, stars[n].y, stars[n].size, 0, Math.PI * 2, true);
        context.arc(stars[n].x, stars[n].y, stars[n].size * animationScale, 0, Math.PI * 2, true);
        context.fill();
    }
}
function canvasSize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
function DistanceBetween(client, object) {
    var xDistance = client.x - object.x;
    var yDistance = client.y - object.y;
    return Math.sqrt((xDistance * xDistance) + (yDistance * yDistance));
}
var mouseLocation = {
    xLocation: 0,
    yLocation: 0
};
function MouseMove(client) {
    mouseLocation.x = client.layerX;
    mouseLocation.y = client.layerY;
}

//# sourceMappingURL=all.js.map
