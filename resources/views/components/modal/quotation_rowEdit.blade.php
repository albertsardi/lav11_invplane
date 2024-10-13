<div id='modal-quotation-row-edit'>
    <form>
        <div class="mb-3">
            <label for="" class="form-label">id</label>
            <input name="id" type="text" class="form-control" readonly value=''>
        </div>    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product</label>
            <!-- <input name="ProductCode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
            <select name="Product" id="Product">
                @foreach($mProduct as $m)
                <option value='{{$m->id}}'>{{$m->id??''}} | {{$m->Name??''}}</option>
                @endforeach
            </select>
            <input name="ProductCode" type="text" class="form-control">
            <input name="ProductName" type="text" class="form-control">
            <div id="emailHelp" class="form-text">Choose at least 1 product</div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Qty</label>
            <input name="Qty" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input name="Price" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Amount</label>
            <input name="Amount" type="text" class="form-control" readonly value=0>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Unit Cost</label>
            <input name='Cost' type="text" class="form-control" readonly value=0>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="cmSubmit btn btn-primary">Submit</button>
        <button type="button" class="cmAddRow btn btn-primary" onclick='addRow()'>Add</button>
    </form>
</div>
