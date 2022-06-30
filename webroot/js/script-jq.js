$(document).ready(function(){
    $('#p2').click(function(){
        
        if($('#password2').attr('type') == 'text'){
            $('#password2').attr('type','password')
        }
        else{
            $('#password2').attr('type','text')
        }
    })

    $('#p1').click(function(){
        
        if($('#password').attr('type') == 'text'){
            $('#password').attr('type','password')
        }
        else{
            $('#password').attr('type','text')
        }
    })
        
})