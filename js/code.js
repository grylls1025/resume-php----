/**
 * Created by 禹轩1025 on 2016/9/4.
 */
window.addEventListener('load',function(){

    //点击验证码局部刷新
    var img_code=document.getElementById('img_code');
    img_code.onclick=function(){
        this.src='code.php?tm='+Math.random();

    };
});