@switch($status)
    @case('draft')
        <span class="alert alert-primary" >{{__('Draft')}}</span>
        @break
    @case('pending')
        <span class="alert alert-warning" >{{__('Pending')}}</span>
        @break
    @case('complete')
        <span class="alert alert-success" >{{__('Complete')}}</span>
        @break
    @case('close')
        <span class="alert alert-danger" >{{__('Close')}}</span>
        @break
    @case('in_progress')
        <span class="alert alert-info" >{{__('In Progress')}}</span>
        @break
    @case('publish')
        <span class="alert alert-success" >{{__('Publish')}}</span>
        @break
    @case('confirm')
        <span class="alert alert-success" >{{__('Confirm')}}</span>
        @break
    @case('yes')
        <span class="alert alert-success" >{{__('Yes')}}</span>
        @break
    @case('no')
        <span class="alert alert-danger" >{{__('No')}}</span>
        @break
    @case('cancel')
        <span class="alert alert-danger" >{{__('Cancel')}}</span>
        @break
    @case('replied')
        <span class="alert alert-success" >{{__('Replied')}}</span>
        @break
    @case('opened')
        <span class="alert alert-info" >{{__('Opened')}}</span>
        @break
    @case('cancel')
        <span class="alert alert-danger" >{{__('Cancel')}}</span>
        @break
    @default
    <span class="alert alert-info" >{{__('Status Not Available')}}</span>
@endswitch