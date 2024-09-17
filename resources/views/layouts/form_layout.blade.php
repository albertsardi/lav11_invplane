<!DOCTYPE html>

<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>{{$title??'no-title'}}</title>

@include('components.header')
    
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

