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

        })
    })



    $(".button-collapse").sideNav();



})
