@if (session('StatusAdd'))
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{session('StatusAdd')}}</p>
</div>
@endif
@if (session('StatusDeactivate'))
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{session('StatusDeactivate')}}</p>
</div>
@endif    
@if (session('StatusEdit'))
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p>{{session('StatusEdit')}}</p>
</div>
@endif
@if (session('ErrorEdit'))
<div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{session('ErrorEdit')}}</p>
</div>
@endif
@if (session('Message'))
<div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>    
    <p>{{session('Message')}}</p>
</div>
@endif
@if (session('SearchMessage'))
<div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>    
    <p>{{session('SearchMessage')}}</p>
</div>
@endif
