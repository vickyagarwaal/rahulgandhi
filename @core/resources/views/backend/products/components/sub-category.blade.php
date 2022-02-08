@if(count($all_sub_category) > 0)
<div class="form-group">
    <label for="sub_category_id">{{('Sub Category')}}</label>
    <select class="form-control" name="sub_category_id" id="sub_category_id">
        <option value="parent" selected disabled>{{__('Select Sub Category')}}</option>
        @foreach ($all_sub_category as $data)
            <option value="{{$data->id}}">{{purify_html($data->name)}}</option>
        @endforeach
    </select>
</div>
@endif