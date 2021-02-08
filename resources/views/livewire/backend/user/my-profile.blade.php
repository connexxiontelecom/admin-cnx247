<div class="card">

    <div class="row">
        <div class="col-lg-12">
            <div class="cover-profile">
                <div class="profile-bg-img">
                    <img class="profile-bg-img img-fluid" id="cover-preview" src="/assets/images/cover-photos/cover.jpeg" width="1202" height="217" alt="bg-img">
                    <div class="card-block user-info">
                        <div class="col-md-12">
                            <div class="media-left">
                                <a href="#" class="profile-image">
                                    <img height="108" width="108" class="user-img img-radius" id="avatar-preview" src="/assets/images/avatars/medium/{{Auth::user()->avatar ?? 'avatar.png'}}" alt="user-img">
                                </a>
                            </div>
                            <div class="media-body row">
                                <div class="col-lg-12">
                                    <div class="user-title">
                                        <h2>{{Auth::user()->first_name ?? ''}} {{Auth::user()->surname ?? ''}}</h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
            @include('livewire.backend.user.common._profile-slab')
        </div>
    </div>
</div>
@push('profile-script')
 <script src="{{asset('/assets/js/cus/profile.js')}}"></script>
@endpush
