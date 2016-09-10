/**
 * Created by 禹轩1025 on 2016/9/7.
 */
$(document).ready(function(){
    $('#face1').mouseover(function(){
        $('#face1').fadeOut("slow");
    });

    $('#face').mouseout(function(){
        $('#face1').fadeIn("slow");
    });

    $('#login dl').fadeIn(800);
    $('#register dl').fadeIn(800);
    $('#board1').fadeIn(800);
    $('#domo1').fadeIn(800);

    // var i=300;
    // timer=setInterval(function () {
    //     i=i-5;
    //     $('#face0').css('margin',i+'px auto');
    //     if(!i){
    //         clearInterval(timer);
    //     }
    // },25);

    $('#face0').animate({margin:'50px auto'},2000);

    setTimeout(function(){
       $('#face0 h5#h1').fadeIn(500);
    },1500);
    setTimeout(function(){
        $('#face0 h5#h2').fadeIn(500);
    },2000);
    setTimeout(function(){
        $('#face0 h5#h3').fadeIn(500);
    },2500);
    setTimeout(function(){
        $('#face0 h5#h4').fadeIn(500);
    },3000);
    setTimeout(function(){
        $('#face0 h5#h5').fadeIn(500);
    },3500);

    setTimeout(function(){
        $('#face0 h3').animate({width:'800px'},700,function(){
            $('#face0 h3').html('为渴望而战');

        });
    },1000);

    //头部
    $('#bizhi').click(function(){
        string='url(images/p'+Math.floor(Math.random()*7+1)+'.jpg)';
        $('body').css('background-image',string);
    });
 




});
