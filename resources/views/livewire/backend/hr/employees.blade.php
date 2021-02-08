<div>

    <div class="card">
        <div class="card-block">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h5 class="mb-2 sub-title">Users</h5>
                </div>
            </div>
            <div class="row users-card">
                @if (count($employees) > 0)
                    @foreach ($employees as $emp)
                    <div class="col-lg-6 col-xl-3 col-md-6">
                        <div class="card rounded-card user-card">
                            <div class="card-block">
                                <div class="img-hover">
                                    <img class="img-fluid img-radius" src="/assets/images/avatars/medium/{{$emp->avatar ?? '/assets/images/avatars/medium/avatar.png'}}" alt="{{$emp->first_name ?? ''}}  {{$emp->surname ?? ''}}">
                                </div>
                                <div class="user-content">
                                    <a href="#"><h5 class="">{{$emp->first_name ?? ''}}  {{$emp->surname ?? ''}}</h5></a>
                                    <p class="m-b-0 text-muted">{{$emp->position ?? 'Kindly update profile'}}</p>
                                    <br>
                                </div>

                            </div>
                        </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 col-xl-12 col-md-12">
                        <h5 class="text-muted text-center">There's no result for your search or no employee.</h5>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center" style="cursor: pointer;">
                    {{-- $employees->links() --}}
                </div>
            </div>
        </div>
    </div>
</div>
