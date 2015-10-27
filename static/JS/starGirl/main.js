var can;
var ctx;
var w;
var h;

var girlPic = new Image();
var starPic = new Image();

var num = 60;
var stars = [];

var switchy = false;

var lastTime;
var deltaTime;

function init() {
	can = document.getElementById('canvas');
	ctx = can.getContext('2d');
	w = can.width;
	h = can.height;


	document.addEventListener('mousemove', mousemove, false);

	girlPic.src = '/static/IMAGE/starGirl/girl.jpg';
	starPic.src = '/static/IMAGE/starGirl/star.png';
	for(var i = 0; i < num; i++) {
		var obj = new starObj();
		stars.push(obj)
		stars[i].init();
	}

	lastTime = Date.now();
	gameloop();

}

function mousemove(e) {
	if(e.offsetX || e.layerX) {
		var px = e.offsetX == undefined ? e.offsetX : e.layerX ;
		var py = e.offsetY == undefined ? e.offsetY : e.layerY ;
		// console.log(px);
		// console.log(py);
		if(px > 100 && px < 700 && py> 150 && py < 450) {
			switchy = true;
		}else {
			switchy = false;
		}
		console.log(switchy);
	}
}

document.body.onload = init;

function gameloop() {
	window.requestAnimFrame(gameloop);

	var now = Date.now();
	deltaTime = now - lastTime;
	lastTime = now;


	drawBackground();
	drawGirl();
	drawStars();
}


function drawBackground() {
	ctx.fillStyle = '#393550';
	ctx.fillRect(0, 0, w, h);
}

function drawGirl() {
	// drawImage(img, x, y)
	ctx.drawImage(girlPic, 100, 150, 600, 300);
}