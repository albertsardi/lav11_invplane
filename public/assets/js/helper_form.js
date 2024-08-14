// function showLookup($lookupType) {
//     Metro.dialog.open('#demoDialog1');
// }

//Form Event
var m=-1; //modal dialog
var t=-1; //target lookup dialog
var line=-1;
$(document).ready(function() {
    //alert('tedst');
    //helper check box
    $('input[type=checkbox]').change(function() {
        //var name=$(this).attr('name').substr(3);
        var name=$(this).attr('name');
        var v=0;
        if($(this).prop('checked')) v=1;
        $('input[name='+name+']').val( v );
    })
    // $("[data-toggle='datepicker']").datepicker({
    //     autoHide:true,
    //     format:'yyyy-mm-dd'
    // });

    //cmLookup click
    // $('button.cmLook').click(function() {
    //     //check if modal exit
    //     var modal=$(this).attr('data-target'); //alert(modal);
    //     if($(modal).length == 0) { alert('modal window '+modal+' not exist');exit(); }
    //     //show lookup
    //     target=$(this).attr('target'); //alert(target);
    //     //$('.modal').modal('show');
    //     $(modal).modal('show');
    // })

    //modal select
    //$('#modal-window a').click(function(e) {
    // $('.modal a').click(function(e) {
    //     e.preventDefault();
    //     var sel=$(this).text(); //alert(sel);
    //     if( targetrow==null) { //for form
    //         alert(target);
    //         $('input[name='+target+']').val(sel);
    //         $('input[name='+target+']').change();
    //     } else { //for grid
    //         $("input[name='"+target+"[]']:eq("+targetrow+")").val(sel);
    //         $("input[name='"+target+"[]']:eq("+targetrow+")").change();
    //     }
    //     targetrow=null;
    //     $(".modal .close").click();
    // })


    //grid cmLookup click
    // $('button.cmGridLook').click(function() {
    //     //check if modal exit
    //     var modal=$(this).attr('data-target');
    //     if($(modal).length == 0) { alert('modal window '+modal+' not exist');exit(); }
    //     //show lookup
    //     target=$(this).attr('target');
    //     targetrow=$(this).parent().attr('line');
    //     //$('#modal-window').modal('show');
    //     $(modal).modal('show');
    // })


    //numeric format
    //$("input[type='num']").css('text-align','right'); //.css('background-color','red');
    //$(".number").autoNumeric('init', {aSign: '$ '});


    //using metro
    var m=-1; //modal dialog
    var t=-1; //target lookup dialog
    //lookup button click
    $('button.cmLookup').click(function() {
        m=$(this).attr('lookup-modal'); //alert('m='+m);
        t=$(this).attr('lookup-target'); //alert('t='+t);
        if($(m).length != 0) { 
            //Metro.dialog.open('#'+m);
        } else { 
            alert('modal window '+m+' not exist'); 
        }
    })
    //lookup modal select
    $('a.dialog-link').click(function(e) {
        e.preventDefault();
        var sel=$(this).text();
        // alert(t+' - '+line);
        // alert('sel='+sel+' t='+t+' line='+line);
        if(t.indexOf("grid-") == -1) {
            //form
            $("input[name='"+t+"']").val(sel).change();
        } else {
            //grid
            if(t.substring(t.length - 2) != '[]') t=t+='[]';
            $("input[name='"+t+"']:eq("+gline+")" ).val(sel).change();
        }
        //Metro.dialog.close('#'+m);
        $('button#cmModalClose').click();
    })
    //format input numeric
    //$("input.num").css('text-align','right').number(true,0); //css('background-color','red'); //0 digit di belakang koma
    //var nv=$("input[type='num']").val();
    //$("input[type='num']").val('Rp. '+nv);
    // $("input[type='num']").autoNumeric('init', {aSign: "€ "});

    //format date using datepicker.js
    // $("[data-toggle='datepicker']").datepicker({
    //     //autoHide:true,
    //     format:'yyyy-mm-dd'
    // });
})

//------------------------------
// JS Edit GRID function
//------------------------------

//load form
// function FormLoad(TransNo) {
//     // var dataSource= '_loaddatarow.php?jr=transhead&id='+TransNo ;
//     //var dataSource= '_loadtrans.php?jr=form&id='+TransNo ;
//     var dataSource= "_loadtrans/"+TransNo;
//     //dataSource= "http://localhost/LV_PikeAdmin/public/_loadtrans/"+TransNo;
//     //dataSource= "{{ public_path()}}/_loadtrans/"+TransNo;
//     //dataSource= '{{ route("_loadTrans", ":id") }}'; dataSource= dataSource.replace(':id', TransNo);
//     //dataSource= '{{ route("loadTrans", ":id") }}'; dataSource= dataSource.replace(':id', TransNo);

//     console.log(dataSource);
//     $.getJSON(dataSource, function(data, status) {
//         console.log(data);
//         for (var nm in data) {
//             //var result='';
//             // obj.hasOwnProperty() is used to filter out properties from the object's prototype chain
//             if (data.hasOwnProperty(nm)) {
//                 //result += nm;
//                 $("input[name='"+nm+"']").val(data[nm]);
//                 $("input[name='"+nm+"']").css('background-color','red');
//                 $("input").val('xyz');
//                 //alert(result);
//             }
//         }
//     })
//     .error(function(jqXHR, textStatus, errorThrown) {
//         console.log("error " + textStatus);
//         console.log("incoming Text " + jqXHR.responseText);
//     });
// }
