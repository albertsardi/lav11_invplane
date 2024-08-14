<!DOCTYPE html>

<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>Fattouch Sanitaire</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="NOINDEX,NOFOLLOW">

<link rel="icon" type="image/png" href="https://demo.invoiceplane.com/assets/core/img/favicon.png"><link rel="icon" type="image/png" href="http://localhost/lav9Invplane/public/assets/images/favicon.ico">

<link rel="stylesheet" href="http://localhost/lav9Invplane/public/assets/css/style.css?v=1.6.1">
<link rel="stylesheet" href="http://localhost/lav9Invplane/public/assets/css/custom.css?v=1.6.1">
<link rel="stylesheet" href="http://localhost/lav9Invplane/public/assets/css/fontawesome/font-awesome.min.css">

    <link rel="stylesheet" href="https://demo.invoiceplane.com/assets/invoiceplane/css/monospace.css?v=1.6.1">

<!--[if lt IE 9]>
<script src="https://demo.invoiceplane.com/assets/core/js/legacy.min.js?v=1.6.1"></script>
<![endif]-->

<script src="https://demo.invoiceplane.com/assets/core/js/dependencies.min.js?v=1.6.1"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .bold{font-weight: bold;}
</style>

@yield('js')

<div id="main-area">
    <div id="main-content">
    	@yield('content')    

    </div>

</div>

<div id="modal-placeholder"></div>

<div id="fullpage-loader" style="display: none">
    <div class="loader-content">
        <i id="loader-icon" class="fa fa-cog fa-spin"></i>
        <div id="loader-error" style="display: none">
            It seems that the application stuck because of an error.<br/>
            <a href="https://wiki.invoiceplane.com/en/1.0/general/faq"
               class="btn btn-primary btn-sm" target="_blank">
                <i class="fa fa-support"></i> Get Help            </a>
        </div>
    </div>
    <div class="text-right">
        <button type="button" class="fullpage-loader-close btn btn-link tip" aria-label="Close"
                title="Close" data-placement="left">
            <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
    </div>
</div>


</body>
</html>


<script>

