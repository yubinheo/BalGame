<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Where's the maze?</title>
</head>
<body>

<br />
<h2>Where's the maze?</h2>
<p>This is my favorite maze. <br />
Now I'm backed by genius hacker HYB! <br />
That's why I hacked into this site. <br /> <br />
Can you find a vulnerability in this site and win the maze and get the flag value? <br />
</p>

<canvas id="maze"></canvas>

<br/>
<br/>

<input type="hidden" id="sizeInput" onkeyup="enterkey();"/>

<br/>
<br/>

<label id="text"></label>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
var tc = 21;
var gs = 20;
var field;
var px = py = 1;
var xv = yv = 0;
var flag_is_xhimObeMkKJZFYwc;
var flag_is_VnCE5TXWF6EXv6Iu;
var flag_is_MNCxomJQodLlbb04;
var flag_is_JdFmg1NQl8IxR0kV = 0;
var cx, cy; 
window.onload=function(){
	canv=document.getElementById("maze");	
	ctx=canv.getContext("2d");	
	document.addEventListener("keydown",keyPush);
	initialize();
}
function enterkey() {
    if (window.event.keyCode == 13) {
    	var sizeInput = document.getElementById("sizeInput").value;
    	if(sizeInput%2==0){
    		alert("Please enter an odd number.");
    	}else{
    		tc=sizeInput;
    		initialize();
    	}
    }
}
function initialize(){
	document.getElementById("sizeInput").value = tc;
	make2DArray();
	ctx.fillStyle="black";
	canv.width=canv.height=tc*gs;
	ctx.fillRect(0,0,canv.width, canv.height);
	makeWay(0,1);
	makeWay(tc-1,tc-2);
	px=py=1;
	flag_is_xhimObeMkKJZFYwc = {x:px, y:py};
	flag_is_VnCE5TXWF6EXv6Iu = [];
	flag_is_VnCE5TXWF6EXv6Iu.push(flag_is_xhimObeMkKJZFYwc);
	flag_is_MNCxomJQodLlbb04 = false;
	randomMazeGenerator();
	cx=0; cy=1;
	ctx.fillStyle="red";
	ctx.fillRect(cx*gs,cy*gs,gs, gs);
}
function makeWay(xx,yy){
	field[yy][xx]++;
	ctx.fillStyle="white";
	ctx.fillRect(xx*gs,yy*gs,gs, gs);
}

var tc = 21;
var gs = 20;
var field;
var px = py = 1;
var xv = yv = 0;
var flag_is_xhimObeMkKJZFYwc;
var flag_is_VnCE5TXWF6EXv6Iu;
var flag_is_MNCxomJQodLlbb04;
var flag_is_JdFmg1NQl8IxR0kV = 0;
var cx, cy; 
window.onload=function(){
	canv=document.getElementById("maze");	
	ctx=canv.getContext("2d");	
	document.addEventListener("keydown",keyPush);
	initialize();
}
function enterkey() {
    if (window.event.keyCode == 13) {
    	var sizeInput = document.getElementById("sizeInput").value;
    	if(sizeInput%2==0){
    		alert("Please enter an odd number.");
    	}else{
    		tc=sizeInput;
    		initialize();
    	}
    }
}
function initialize(){
	document.getElementById("sizeInput").value = tc;
	make2DArray();
	ctx.fillStyle="black";
	canv.width=canv.height=tc*gs;
	ctx.fillRect(0,0,canv.width, canv.height);
	makeWay(0,1);
	makeWay(tc-1,tc-2);
	px=py=1;
	flag_is_xhimObeMkKJZFYwc = {x:px, y:py};
	flag_is_VnCE5TXWF6EXv6Iu = [];
	flag_is_VnCE5TXWF6EXv6Iu.push(flag_is_xhimObeMkKJZFYwc);
	flag_is_MNCxomJQodLlbb04 = false;
	randomMazeGenerator();
	cx=0; cy=1;
	ctx.fillStyle="red";
	ctx.fillRect(cx*gs,cy*gs,gs, gs);
}
function makeWay(xx,yy){
	field[yy][xx]++;
	ctx.fillStyle="white";
	ctx.fillRect(xx*gs,yy*gs,gs, gs);
}
function keyPush(b) {
	if(flag_is_JdFmg1NQl8IxR0kV>=500000000) {
		$.post("./flag.php", {
			name:"flagiswhat",data:"dkanshfoskdlfeksxmfdj"
		}
		,function(a)
			{
			alert(a)
		})
	} console.log(flag_is_JdFmg1NQl8IxR0kV);
	switch(b.keyCode)
		{
		case 37:xv=-1;
		yv=0;
		break;
		case 38:xv=0;
		yv=-1;
		break;
		case 39:xv=1;
		yv=0;
		break;
		case 40:xv=0;
		yv=1;
		break
	}
	cx+=xv;
	cy+=yv;
	if(cx<0||cx>tc-1||cy<0||cy>tc-1||field[cy][cx]==0)
		{
		cx-=xv;
		cy-=yv;
		return
	}
	else
		{
		ctx.fillStyle="red";
		ctx.fillRect(cx*gs,cy*gs,gs,gs);
		ctx.fillStyle="white";
		ctx.fillRect((cx-xv)*gs,(cy-yv)*gs,gs,gs);
		document.getElementById("text").innerHTML="cx: "+cx+" cy: "+cy;
		if(cx==tc-1&&cy==tc-2)
			{
			alert("You Win!");
			flag_is_JdFmg1NQl8IxR0kV++;
			initialize()
		}
	}
}
function make2DArray(){
	console.log("tc: " + tc);
	field = new Array(parseInt(tc));
	for(var i=0; i<field.length; i++){
		field[i] = new Array(parseInt(tc));
	}
	console.log("field length: " + field.length);
	for(var i=0; i<field.length; i++){
		for(var j=0; j<field[i].length; j++){
			field[i][j]=0; // value of 0 is for not visited, 1 for visited, 2 for backtracked.
		}
	}
	console.log("field: " + field);
} function randomMazeGenerator(){
	var cnt=0;
	while(flag_is_VnCE5TXWF6EXv6Iu.length>0){
		if(flag_is_MNCxomJQodLlbb04)
			backtracking();
		else	
			tracking();
	}			
} function tracking(){
	
	/* Random Move */
	key = Math.floor(Math.random()*4);
	switch(key){
	case 0: // left move
		xv=-2;yv=0;
		break;
	case 1: // up move
		xv=0;yv=-2;
		break;
	case 2: // right move
		xv=2;yv=0;
		break;
	case 3: // down move
		xv=0;yv=2;
		break;
	}
	
	px+=xv;
	py+=yv;
	if(px<0 || px>tc-1 || py<0 || py>tc-1){
		px-=xv;
		py-=yv;
		return;
	} 
	if(field[py][px]<1){
		makeWay(px-xv/2,py-yv/2);
		makeWay(px,py);
		flag_is_xhimObeMkKJZFYwc = {x:px, y:py};
		flag_is_VnCE5TXWF6EXv6Iu.push(flag_is_xhimObeMkKJZFYwc);
		blockCheck();	
	}else{
		px-=xv;
		py-=yv;
		return;
	}

} function blockCheck(){
	var blockCount = 0;
	if(py+2>tc-1 || field[py+2][px]!=0)
		blockCount++;
	if(py-2<0 || field[py-2][px]!=0)
		blockCount++;
	if(px+2>tc-1 || field[py][px+2]!=0)
		blockCount++;
	if(px-2<0 || field[py][px-2]!=0)
		blockCount++;
	if(blockCount>=4)
		flag_is_MNCxomJQodLlbb04 = true;
	else
		flag_is_MNCxomJQodLlbb04 = false;
} function backtracking(){
	var backflag_is_xhimObeMkKJZFYwc = flag_is_VnCE5TXWF6EXv6Iu.pop();
	px = backflag_is_xhimObeMkKJZFYwc.x;
	py = backflag_is_xhimObeMkKJZFYwc.y;
	blockCheck();	
}
function make2DArray(){
	console.log("tc: " + tc);
	field = new Array(parseInt(tc));
	for(var i=0; i<field.length; i++){
		field[i] = new Array(parseInt(tc));
	}
	console.log("field length: " + field.length);
	for(var i=0; i<field.length; i++){
		for(var j=0; j<field[i].length; j++){
			field[i][j]=0; // value of 0 is for not visited, 1 for visited, 2 for backtracked.
		}
	}
	console.log("field: " + field);
} function randomMazeGenerator(){
	var cnt=0;
	while(flag_is_VnCE5TXWF6EXv6Iu.length>0){
		if(flag_is_MNCxomJQodLlbb04)
			backtracking();
		else	
			tracking();
	}			
} function tracking(){
	
	/* Random Move */
	key = Math.floor(Math.random()*4);
	switch(key){
	case 0: // left move
		xv=-2;yv=0;
		break;
	case 1: // up move
		xv=0;yv=-2;
		break;
	case 2: // right move
		xv=2;yv=0;
		break;
	case 3: // down move
		xv=0;yv=2;
		break;
	}
	
	px+=xv;
	py+=yv;
	if(px<0 || px>tc-1 || py<0 || py>tc-1){
		px-=xv;
		py-=yv;
		return;
	} 
	if(field[py][px]<1){
		makeWay(px-xv/2,py-yv/2);
		makeWay(px,py);
		flag_is_xhimObeMkKJZFYwc = {x:px, y:py};
		flag_is_VnCE5TXWF6EXv6Iu.push(flag_is_xhimObeMkKJZFYwc);
		blockCheck();	
	}else{
		px-=xv;
		py-=yv;
		return;
	}

} function blockCheck(){
	var blockCount = 0;
	if(py+2>tc-1 || field[py+2][px]!=0)
		blockCount++;
	if(py-2<0 || field[py-2][px]!=0)
		blockCount++;
	if(px+2>tc-1 || field[py][px+2]!=0)
		blockCount++;
	if(px-2<0 || field[py][px-2]!=0)
		blockCount++;
	if(blockCount>=4)
		flag_is_MNCxomJQodLlbb04 = true;
	else
		flag_is_MNCxomJQodLlbb04 = false;
} function backtracking(){
	var backflag_is_xhimObeMkKJZFYwc = flag_is_VnCE5TXWF6EXv6Iu.pop();
	px = backflag_is_xhimObeMkKJZFYwc.x;
	py = backflag_is_xhimObeMkKJZFYwc.y;
	blockCheck();	
}
</script>

</body>
</html>