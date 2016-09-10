/**
 * Created by 禹轩1025 on 2016/9/3.
 */
window.onload=function(){

    var form=document.getElementsByTagName('form')[0];
    form.onsubmit=function(){

        //
        if(form.username.value.length<2||form.username.value.length>20){
            alert('用户名长度需2~20位！');
            form.username.value='';
            form.username.focus();
            return false;
        }

        //
        if(/[<>\'\"\ \　]/.test(form.username.value)){
            alert('用户名不得包含敏感字符！');
            form.username.value='';
            form.username.focus();
            return false;
        }

        //
        if(form.password.value.length<6||form.password.value.length>8){
            alert('密码只能6~8位');
            form.password.value='';
            form.password.focus();
            return false;
        }

        //
        if(form.password.value!=form.notpassword.value){
            alert('密码和确认密码不一致');
            form.notpassword.value='';
            form.notpassword.focus();
            return false;
        }

        //
        if(form.yzm.value.length!=4){
            alert('验证码必须是4位');
            form.yzm.value='';
            form.yzm.focus();
            return false;
        }

        return true;
    };



};
