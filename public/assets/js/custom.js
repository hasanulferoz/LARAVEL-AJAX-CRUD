(function($){

    var _modal = $('#modal');
    // $.ajaxSetup({
    //     headers: {'X-CSRF-Token': ''}
    // });
    $(document).ready(function(){
        $('a#add_student_modal_btn').click(function(e){
            e.preventDefault();
            $('#add_student_modal').modal('show');
        });

        //student store

        $(document).on('submit', 'form#add_student_form', function(e){
            e.preventDefault();
            let name = $('form#add_student_form input[name = "name"]').val();
            let email = $('form#add_student_form input[name = "email"]').val();
            let cell = $('form#add_student_form input[name = "cell"]').val();
            let uname = $('form#add_student_form input[name = "uname"]').val();

            //let checkEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if(name == '' || email == '' || cell == '' || uname == ''){
                $('.msg').html(customMsg('All Fields are required'));
            }else if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false){
                $('.msg').html(customMsg('Invalid email address', 'warning'));
            }else{
               

                $.ajax({

                    url : 'student/store',
                    method : "POST",
                    data : new FormData(this),
                    contentType : false,
                    processData : false,
                    success : function(data){
                       // alert(data);
                        allStudent();
                         $('form#add_student_form')[0].reset();
                         $('.msg').html(customMsg('Student Added successful', 'success'));
                         _modal.modal('hide');
                    }
                })
            }
        });

        $(document).on('click', 'a#delete_data', function(e){
            e.preventDefault();
            let student_id = $(this).attr('del_id');

           

            $.ajax({

                url : 'student/delete/'+student_id,
                //method : "POST",
                data: {id: student_id },
                //data : new FormData(this),
                // contentType : false,
                // processData : false,
                success : function(data){
                    // alert(data);
                    //  $('form#add_student_form')[0].reset();
                    allStudent();
                    $('.msg').html(customMsg('Student deleted successful', 'success'));
                    //  allStudent();
                }
            });
        });

        $(document).on('click', 'a#student_view_modal', function(e){

            e.preventDefault();
           //$('#stu_edit').modal('show');


            let student_id = $(this).attr('show_id');
            //alert(student_id);


            $.ajax({

                url : 'student/show/'+student_id,
                //method : "POST",
                data: {id: student_id },
                //data : new FormData(this),
                // contentType : false,
                // processData : false,
                success : function(data){
                    //alert(data.name);
                    //  $('form#add_student_form')[0].reset();
                    // allStudent();
                    // $('.msg').html(customMsg('Student deleted successful', 'success'));
                    //  allStudent();

                    $('.student-single-data img').attr('src', 'media/students/' + data.photo);
                    $('.student-single-data h2').html(data.name);
                    $('.student-single-data h3').html(data.cell);
                    $('.student-single-data table td#name').html(data.name);
                    $('.student-single-data table td#email').html(data.email);
                    $('.student-single-data table td#cell').html(data.cell);
                    $('#stu_edit').modal('show');
                }
            });
        })

    });
  
})(jQuery)