$(document).ready(function(){

    $('#fname').on('input',function(){
        checkFname();
    })

    $('#lname').on('input',function(){
        checkLname();
    })

    $('#email').on('input',function(){
        checkEmail();
    })

    $('#add').click(function(){
        if(!checkFname() && !checkLname() && !checkEmail()){
            $('#message').html('Fill all required fields');
            $('#message').css({'color':'crimson'});
        } else if (!checkFname() || !checkLname() || !checkEmail()){
            $('#message').html('Fill all required fields');
            $('#message').css({'color':'crimson'});
        } else {
            console.log('ok');
            $("#message").html("");
            var form = $('#form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "index.php",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success:function(){
                    console.log('sent');
                    $("#form").trigger("reset");
                    $("#message").html('User added')
                    $('#message').css({'color':'rgb(24, 197, 24)'});
                }
            })
        }
    })

    function checkFname(){
        const pattern = /^[A-Za-z]+$/;
        var fname = $('#fname').val();
        var validFname = pattern.test(fname);
        if(fname == ''){
            $('#errorFname').html('Required field');
            return false;
        } else if(!validFname){
            $('#errorFname').html('Only letters may be used');
            return false;
        } else {
            $('#errorFname').html('');
            return true;
        }
    }

    function checkLname(){
        const pattern = /^[A-Za-z]+$/;
        var lname = $('#lname').val();
        var validLname = pattern.test(lname);
        if(lname == ''){
            $('#errorLname').html('Required field');
            return false;
        } else if(!validLname) {
            $('#errorLname').html('Only letters may be used');
            return false;
        } else {
            $('#errorLname').html('');
            return true;
        }
    }

    function checkEmail(){
        const pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $('#email').val();
        var validEmail = pattern.test(email);
        if(email == ''){
            $('#errorEmail').html('Required field');
            return false;
        } else if(!validEmail){
            $('#errorEmail').html('Please use a valid email');
            return false;
        } else {
            $('#errorEmail').html('');
            return true;
        }
    }

    $(".delete").click(function(){
        var id = this.id
        $.ajax({
            url: 'list.php',
            type:'post',
            data:{id:id},
            success:function(){
                location.reload();
            }
        })
    })

})