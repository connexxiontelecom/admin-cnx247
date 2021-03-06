<div class="btn-group " role="group">
    @if(empty($clocked_in))
        @if (\Carbon\Carbon::now() < \Carbon\Carbon::parse(Auth::user()->opening_time)
        ->addMinutes(10)
        ->format('H:i:s'))
            <button wire:ignore type="button"  class="btn btn-success btn-mini waves-effect waves-light clockinBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clock-in">
                <i class="ti-alarm-clock"></i>Clock-in
            </button>
        @endif
    @else
        @if($clocked_in->status == 1)
            @if (\Carbon\Carbon::parse(Auth::user()->closing_time)->format('H:i:s') < \Carbon\Carbon::parse(Auth::user()->closing_time)
                ->addMinutes(10)
                ->format('H:i:s'))
                <button wire:ignore type="button" class="btn btn-danger btn-mini waves-effect waves-light clockoutBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clock-out">
                    <i class="ti-alarm-clock"></i>Clock-out
                </button>
                <button type="button" class="btn btn-inverse btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="When you clocked in">
                    <i class="ti-alarm-clock mr-2" wire:poll.900000ms="updateTimer"></i>{{ date('d M, Y | h:i a', strtotime($clocked_in->clock_in)) }}
                </button>
            @endif
        @endif
    @endif
</div>

@push('clocker-script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.clockinBtn', function(e){
                $('.clockinBtn').html("<i class='ti-alarm-clock'></i>Clocking in...");
                axios.post('/activity-stream/clockin')
                .then(response=>{
                    $.notify("Success! You're now clocked-in", "success");
                    location.reload();
                });
            });
            $(document).on('click', '.clockoutBtn', function(e){
                $('.clockinBtn').html("<i class='ti-alarm-clock'></i>Clocking out...");
                axios.post('/activity-stream/clockout')
                .then(response=>{
                    $.notify("Success! You're now clocked-out", "success");
                    location.reload();
                });
            });
        });
    </script>
@endpush
