@extends('temp-master')

@section('content')
    
    <!-- PANEL1 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> General data</h3>
            </div>
            <div class="card-body">
                {{ Form::text('Code', 'Product #', ['placeholder'=>'ID']) }}
                {{ Form::text('Name', 'Product Name') }}
                {{ Form::text('Barcode', 'Barcode') }}
                {{ Form::combo('Category', 'Category', $mCat) }}
                {{ Form::combo('Type', 'Type', $mType) }}
                {{ Form::combo('HppBy', 'HPP', $mHpp) }}
                {{ Form::checkbox('ActiveProduct', 'Active Product') }}
                {{ Form::checkbox('StockProduct', 'Have Stock') }}
                {{ Form::checkbox('canBuy', 'Product can buy') }}
                {{ Form::checkbox('canSell', 'Product can sell') }}
            </div>
        </div><!-- end card-->
    </div>

    <!-- PANEL2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Other data</h3>
            </div>
            <div class="card-body">
                {{ Form::text('UOM', 'Main Unit') }}
                {{ Form::text('ProductionUnit', 'Production Unit') }}
                {{ Form::number('MinStock', 'Minimal Stock') }}
                {{ Form::number('MaxStock', 'Maximal Stock') }}
                {{ Form::number('SellPrice', 'Sell Price') }}
                {{ Form::number('LastBuyPrice', 'Last Buy Price',['disabled'=>true]) }}
                <br/><br/><br/><br/>
                {{ Form::textwlookup('AccHppNo', 'HPP Account No', ['modal'=>'modal-account']) }}
                {{ Form::textwlookup('AccSellNo', 'Income Account No', ['modal'=>'modal-account']) }}
                {{ Form::textwlookup('AccInventoryNo', 'Inventory Account No', ['modal'=>'modal-account']) }}
            </div>
        </div><!-- end card-->
    </div>
@stop
                    
@section('js')
    <script>
        $(document).ready(function() {
            $(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            $.ajaxSetup({
                async: false
            });
            
            //load data
            //loaddata(post);
            //$.ajax({url: "http://localhost:8000/ajax_getProduct/C-11", 
            $.ajax({url: "{{ url('ajax_getProduct') }}/{{$id}}", 
                success: function(resp){
                    var res=JSON.parse(resp); 
                    //alert(res.status);
                    res=res.data;
                    //console.log(res);
                    $.each(res, function( f, v ) {
                        $("input[name='"+f+"']").val(v);
                    })
                }
            });
            
            /*var dataSource= "http://localhost:8000/ajax_getProduct/C-11";
            $.getJSON(dataSource, function(data, status) {
                for(var row=0;row<data.length;row++) {
                    console.log(data);
                }
            })  */
            
            //cmSave click
            $('button#cmSave').click(function() {
                //alert('Save');
                /*var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i>Saving, Please wait ...</p>',
                    closeButton: false
                });*/
                
                //$(this).text('Save...');
                //form
                var data = $('form').serialize();
                //return (data);
                //$.post( '_data-edit-save.php?form=product', data, function(data) {
                $.post( 'datasave_product', data, function(res) {
                    //... do something with response from server
                    //alert(res);
                    console.log(res);
                    $('#result').text( res );
                    /*bootbox.alert({
                        message: data, backdrop:true
                    });*/
                    //$('#pop').show();
                    //if(data!='') $('.alert').visible();
                    //$('#info2').text( data );
                    //$(this).text('Save');
                    // save dialog
                    //dialog.modal('hide');
                });
                //dialog.modal('hide');
            })

            //tbLookup Event
            $('input[type=lookup]').change(function() {
                var nm=$(this).attr('name');
                var find=$(this).val();
                var row='';
                for(var a=0;a<mcoa.length;a++) {
                    row=mcoa[a];
                    if(row.AccNo==find) break;
                }
                $('#label-'+nm).text(row.AccName); 
                //alert(row.AccName);
            }) 
        });
    </script>
@stop

