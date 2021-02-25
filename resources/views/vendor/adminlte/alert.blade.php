@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success pl-5" role="alert">
        {{\Illuminate\Support\Facades\Session::get('success')}}
    </div>
@elseif(\Illuminate\Support\Facades\Session::has('errors'))
    <div class="alert alert-danger" role="alert">
        {{\Illuminate\Support\Facades\Session::get('errors')}}
    </div>
@endif
<style>
    .alert-success{
        padding-left: 10rem!important;
    }
    .alert-danger{
        padding-left: 10rem!important;
    }
</style>