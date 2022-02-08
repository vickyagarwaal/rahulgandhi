@if($level == 'sub')
<div class="form-group">
    <select class="form-control" name="parent_id" id="parent_category">
        <option value="parent" selected disabled>{{__('Select Parent Category')}}</option>
        @foreach ($all_parent_category as $data)
            <option value="{{$data->id}}">{{purify_html($data->name)}}</option>
        @endforeach
    </select>
</div>
@endif