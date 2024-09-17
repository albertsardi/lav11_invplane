<!-- Invoice 1 - Bootstrap Brain Component -->
<link rel="stylesheet" href="http://localhost/lav11_invplanePdf/public/assets/css/mpdf-bootstrap.min.css">
<style>
  .text-green {
    color:#77B632;
  }
</style>
<?php #dd($data);?>
<?php #dd($data->detail);?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
        <div class="row gy-3 mb-3">
          <div class="col-6">
            <h2 class="text-uppercase text-endx m-0 text-green">Invoice</h2>
          </div>
          <div class="col-6">
            <a class="d-block text-end" href="#!">
              <img src="http://localhost/lav11_invplanePdf/public/assets/images/logo.png" class="xximg-fluid" alt="BootstrapBrain Logo" >
            </a>
          </div>
          <div class="col-12">
            <h4>From</h4>
            <address>
              {!! $from !!}
            </address>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-6 col-md-8">
            <h4>Bill To</h4>
            <address>
              {!! $to !!}
            </address>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <?php #dd($data)?>
            <h4 class="row">
              <span class="col-6 text-green">Invoice #</span>
              <span class="col-6 text-sm-end text-green">{{$data->TransNo}}INT-001</span>
            </h4>
            <div class="row">
              <span class="col-6">Account</span>
              <span class="col-6 text-sm-end">{{$data->account->AccCode??''}}</span>
              <span class="col-6">Order ID</span>
              <span class="col-6 text-sm-end">#{{$data->OrderNo??''}}</span>
              <span class="col-6">Invoice Date</span>
              <span class="col-6 text-sm-end">{{date_create($data->TransDate,'d/m/Y') }}</span>
              <span class="col-6">Due Date</span>
              <span class="col-6 text-sm-end">{{date_create($data->DueDate,'d/m/Y') }}</span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="text-uppercase">Qty</th>
                    <th scope="col" class="text-uppercase">Product</th>
                    <th scope="col" class="text-uppercase text-right">Unit Price</th>
                    <th scope="col" class="text-uppercase text-right">Amount</th>
                  </tr>
                </thead>
                <?php #dd($table);?>
                <tbody class="table-group-divider">
                  @foreach($data->detail as $t)

                  <?php 
                    $product = ($t->ProductCode??'').' - '.($t->ProductName??'')
                  ?>
                  <tr>
                    <th scope="row">{{$t->Qty??''}}</th>
                    <td>{{$product??''}}</td>
                    <td class="text-right">{{$t->Price??''}}</td>
                    <td class="text-right">{{$t->Amount??''}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="3" class="text-end">Subtotal</td>
                    <td class="text-end">{{$subtotal??0}}</td>
                  </tr>
                  <tr>
                    <?php
                      $tax = .05 * $subtotal;
                      $shipping = 15;
                      $total = $subtotal + $tax + $shipping;
                    ?>
                    <td colspan="3" class="text-end">VAT (5%)</td>
                    <td class="text-end">{{$tax}}</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-end">Shipping</td>
                    <td class="text-end">{{$shipping??0}}</td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="3" class="text-uppercase text-end">Total</th>
                    <td class="text-end">{{$total??0}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary mb-3">Download Invoice</button>
            <button type="submit" class="btn btn-danger mb-3">Submit Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>