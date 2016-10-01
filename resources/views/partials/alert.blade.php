@if(!empty($request->session()->has('alert')))
<div class="alert alert-{{$request->session()->get('alert')}}">
	{{$request->session()->get('message')}}
</div>
@endif