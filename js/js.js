$('document').ready(function(){

    console.log();

    var init = function(){
        $.ajax({
            url:'querys/diners.php',

        }).done(function(data){
            $('#ajax').html(data);

            $('.payed').change(function(){
                var id= $(this).data('id');
                var pay=$(this).val();
                // console.log(id, pay);
                $.ajax({
                    method:'POST',
                    data:{
                        id:id,
                        pay:pay
                    },
                    url:'querys/updatedebt.php',
                })

                var payval=$(this).val();
                var tpayd=$('#totalPayed').text().replace("$","");
                var totalMonth =$('#totalMonth').text().replace("$","");
                // var tdebt=+($('#totalDebted').text().replace("$",""));
                var tot=0;
                // console.log($(this).val());
                if ($(this).val()=='') {
                    $(this).val(0);
                }
                $(this).parent().parent().next().find('input').val(payval - $('.share').data('share'))
                $('.payed').each(function(){
                    tot+=+($(this).val());
                })
                $('#totalPayed').text('$'+tot.toFixed(2));
                console.log(tpayd,tot);
                $('#totalDebted').text('$'+(totalMonth-tot).toFixed(2));

                var $toastContent = $('<span>Datos Actualizados</span>');
                Materialize.toast($toastContent,3000);
            })

        })
    }



    if ($('#ajax').data('ajaxini') == true) {
        init();
    }
    $('#income').click(function(){
        init();
    });
    $('#tips').click(function(){
        $.ajax({
            url:'querys/daily.php'
        }).done(function(data){

            $('#ajax').html(data)


            $('.payedDaily').change(function(){
                var id= $(this).data('id');
                var pay=$(this).val();
                var day=$(this).data('day');

                // console.log(id, pay);
                $.ajax({
                    url:'querys/updatedaily.php',
                    method:'POST',
                    data:{
                        day:day,
                        id:id,
                        pay:pay
                    },
                })
            });

        })
    })
    $('#config').click(function(){
        $.ajax({
            url:'querys/config.php'
        }).done(function(data){

            $('#ajax').html(data)

        })
    })
    $('#user').click(function(){
        $.ajax({
            url:'querys/users.php'
        }).done(function(data){

            $('#ajax').html(data)

            $('.modal-trigger').leanModal();

            $('#subUser').click(function(){
                var name = $('#first_name').val();

                $.ajax({
                    method:'POST',
                    data:{
                        name:name,
                    },
                    url:'querys/updateUser.php?op=2'
                }).done(function(data){
                    $('#ajax').load('querys/users.php');
                })


            })

            $('input ').click(function(){

                var id= $(this).data('id');
                if ($(this).prop('checked')) {
                        // console.log('yes');
                        was = 1;
                }else{
                    // console.log('no');
                        was = 0;

                }

                $.ajax({
                    url:'querys/updateUser.php?op=1',
                    method:'POST',
                    data:{
                        was:was,
                        id:id
                    },
                })
            });


        })
    })



    $(".button-collapse").sideNav();



})
