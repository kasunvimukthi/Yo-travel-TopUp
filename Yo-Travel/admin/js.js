document.getElementById('button1').addEventListener('click',
function(){
    document.querySelector('.login-box').style.display = 'block';
});

document.getElementById('close').addEventListener('click',
function(){
    document.querySelector('.login-box').style.display = 'none';
});

document.getElementById('button2').addEventListener('click',
function(){
    document.querySelector('.login-box1').style.display = 'block';
    
});

document.getElementById('close1').addEventListener('click',
function(){
    document.querySelector('.login-box1').style.display = 'none';
});

document.getElementById('button4').addEventListener('click',
function(){
    document.querySelector('.login-box').style.display = 'block';
    document.querySelector('.login-box1').style.display = 'none';
});

