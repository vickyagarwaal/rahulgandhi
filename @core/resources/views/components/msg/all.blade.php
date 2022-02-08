@if(session()->has('msg'))
    <div class="alert alert-{{session('type')}}">
        {!! purify_html(session('msg')) !!}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-none">
            <button type="button btn-sm" class="close" data-dismiss="alert">×</button>
            @foreach($errors->all() as $error)
                <li> {{$error}}</li> 
            @endforeach
        </ul>
    </div>
@endif