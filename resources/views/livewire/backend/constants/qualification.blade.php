<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="sub-title">Add New Qualification</h5>
            </div>
            <div class="card-block">
                <form wire:submit.prevent="submitQualification">
                    @if (session()->has('success'))
                        <div class="alert alert-success background-success mt-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            {!! session()->get('success') !!}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Qualification</label>
                        <input type="text" class="form-control" placeholder="Qualification" wire:model="qualification">
                        @error('qualification')
                            <i class="text-danger mt-2">{{$message}}</i>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-mini btn-primary" type="submit"> <i class="ti-check"></i> Submit</button>
                        <div class="preloader3 loader-block" wire:loading wire.target="submitQualification">
                            <div class="circ1 loader-primary"></div>
                            <div class="circ2 loader-primary"></div>
                            <div class="circ3 loader-primary"></div>
                            <div class="circ4 loader-primary"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="sub-title">Qualifications</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($qualifications as $qualification)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$qualification->name ?? ''}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


