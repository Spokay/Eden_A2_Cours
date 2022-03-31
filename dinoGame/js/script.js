let canvas = document.querySelector("#mycanvas");
canvas.width = 1000;
canvas.height = 500;
let ctx  = canvas.getContext("2d");

function Box(option){
    this.x = option.x || 10;
    this.y = option.y || 10;
    this.width = option.width || 40;
    this.height = option.height || 50;
    this.color = option.color || '#000000';
    this.speed = option.speed || 1;
    this.gravity = option.gravity || 1;
    this.reset = option.reset;
}


let character = new Box({
    x: 10,
    y: 10,
    width: 40,
    height: 80,
    color: 'red',
    gravity: 10,
    reset: function(){

    }
});