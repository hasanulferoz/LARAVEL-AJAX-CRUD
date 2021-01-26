// const { identity } = require("lodash");

function customMsg(msg, type='danger'){
    return '<p class="alert alert-'+ type +'">'+ msg +'<button class="close" data-dismiss="alert">&times;</button></p>'
}

allStudent();
function allStudent(){
    $.ajax({
        url: 'student/all',
        success: function(data){
            $('tbody#all_student').html(data);
            //alert(data);
        }
    });
}

