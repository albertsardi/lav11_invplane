@extends('temp-trans')
@section('header')
    <!-- PANEL1 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> General data</h3>
            </div>
            <div class="card-body">
                {{ Form::text('TransNo','Transaction #') }}
                {{ Form::date('TransDate','Date') }}
                {{ Form::text('TaxNo','Tax No.') }}
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
                {{ Form::combo('AccCode', 'Order To', $mAcc) }}
                {{ Form::combo('Warehouse', 'Warehouse', $mWarehouse) }}
            </div>
        </div><!-- end card-->
    </div>
@stop
                    
<!-- GRID -->
@section('grid')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        {{ HTML::card_open('Detail') }}
            @php
                $f = [
                    ['name' => 'ProductCode', 'caption' => 'Product#', 'width' => '20'],
                    ['name' => 'cm', 'type' => 'button', 'modal' => 'modal-product', 'target' => 'ProductCode', 'target2' => 'ProductName'],
                    ['name' => 'ProductName', 'caption' => 'Product Name', 'width' => '40', 'other' => 'disabled'],
                    ['name' => 'Qty', 'caption' => 'Quantity', 'width' => '10'],
                    ['name' => 'Price', 'caption' => 'Price', 'width' => '20'],
                    ['name' => 'Amount', 'caption' => 'Amount', 'width' => '20', 'other' => 'num disabled']
                ];
            @endphp
            {{ EGrid('grid', $f) }}
        {{ HTML::card_close() }}
    </div>
@stop

@section('footer')
    <!-- Footer Baru -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class='form-row'>
                    {{ Formline_number('SubTotal','Sub Total') }}
                    {{ Formline_number('DiscAmountH','Disc') }}
                    {{ Formline_number('TaxAnount','Tax') }}
                    {{ Formline_number('Total','Total') }}
                </div>
            </div>
        </div><!-- end card-->
    </div>
@stop

@section('js')
<!-- PHP Function -->
<?php
    function Formline_number($name, $label) 
    {
        echo "<div class='form-group col'>
                <label for='input$name'>$label</label>
                <input name='$name' type='numeric' class='form-control' autocomplete='off' readonly>
            </div>";
    }
?>
<!-- End PHP Function -->

<!-- JS Function -->
<script>
    function calcAll() {
        var tot = 0;
        var line = 0;
        $.each($("div.grow"), function() {
            if ($(this).is(':visible')) {
                var qty = cnum(cell(line, 'Qty'));
                var price = cnum(cell(line, 'Price'));
                var amount = qty * price;
                setcell(line, 'Amount', amount);
                tot = tot + amount;
            }
            line++;
        });
        //tot=fnum(tot);
        $("input[name='SubTotal']").val(tot);
        // alert( $("input[name='SubTotal']").val() );
        //alert('xx');
    }
    function showLookup(lookupType, target) {
        alert(lookupType + ' - ' + target);
    }
    function cell(row, col) {
        if (col.substr(-2) != "[]") col = col + "[]"; //nama pakai []
        var v = $("input[name='grid-" + col + "']:eq(" + row + ")").val();
        if (typeof v === "undefined") v = "";
        return v;
    }
    //set call value
    function setcell(row, col, val) {
        if (col.substr(-2) != "[]") col = col + "[]"; //nama pakai []
        $("input[name='grid-" + col + "']:eq(" + row + ")").val(val);
    }
    //editgrid_function
    
    
</script>

<!-- JQuery SCRIPT -->
<script>
    $(document).ready(function() {
        // form load
        $.ajax({url: "{{ url('ajax_getTrans') }}/{{$id}}", 
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
        var option = {
            columns: [
                { type: 'text', name: 'ProductCode', width: 180 },
                { type: 'text', name: 'ProductName', width: 180 },
                { type: 'text', name: 'Qty', width: 180 },
                { type: 'text', name: 'Price', width: 180 },
                { type: 'text', name: 'Amount', width: 180 }
            ]
        }
        var dataSource = "{{ url('ajax_getTransdetail') }}/{{$id}}";
        editgrid_load( 'grid2', dataSource, option);

        //Edit grid
        $('input.cell').change(function() {
            var row = target = $(this).parent().attr('line');
            var col = $(this).attr('name');
            switch (col) {
                case 'grid-ProductCode[]':
                    //alert(col);
                    /*
                    var id = cell(row, 'ProductCode');
                    var dataSource = '_loaddatarow/product/' + id;
                    $.getJSON(dataSource, function(data, status) {
                            setcell(row, 'ProductName', data.Name);
                        })
                        .error(function(jqXHR, textStatus, errorThrown) {
                            console.log("error " + textStatus);
                            console.log("incoming Text " + jqXHR.responseText);
                        });
                    */
                    break;
                case 'grid-Qty[]':
                case 'grid-Price[]':
                    calcAll();
                    break;
            }
        });
        calcAll();
    });
</script>
@stop
