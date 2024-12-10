@extends('admin.body.template')

@section('content')
    <div class="page-content">

@include('_message')
        <div class="row profile-body">
            <!-- left wrapper start -->

            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                     
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">About</h6>
                            {{-- <div class="dropdown">
                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="git-branch" class="icon-sm me-2"></i> <span
                                            class="">Update</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span class="">View
                                            all</span></a>
                                </div>
                            </div> --}}
                        </div>
                        <p>{{Auth::user()->about}}
                           </p>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                                <p class="text-muted">{{Auth::user()->name}} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">UserName:</label>
                                <p class="text-muted">{{Auth::user()->username}} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                                <p class="text-muted">{{Auth::user()->phone}} </p>
                            </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">{{date('d-m-y',strtotime(Auth::user()->created_at))}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">{{Auth::user()->address}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{Auth::user()->email}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                            <p class="text-muted" ><a href="{{Auth::user()->website}}" target="_blank">{{Auth::user()->website}}</a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Profile update</h6>

                        <form class="forms-sample" action="{{url('admin_profile/update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label 0 class="form-label">Name</label>
                                <input type="text" class="form-control"  placeholder="name" name="name" value="{{$getRecord->name}}">
                            </div>
                            <div class="mb-3">
                                <label 0 class="form-label">User Name</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" value="{{$getRecord->username}}">
                            </div>
                            <div class="mb-3">
                                <label 0 class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$getRecord->email}}">
                                <span style="color:red;">{{$errors->first('email')}}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" >
                            </div>
                            (Leave blank if you are not changeing the password)
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" class="form-control"  name="photo" >
                                @if (!@empty($getRecord->photo))
                                <img src="{{asset('upload/'.$getRecord->photo)}}" style="width: 10% ;height: 10%;">

                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{$getRecord->address}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <textarea type="text" class="form-control" name="about" id="about"  placeholder="About">{{$getRecord->about}}</textarea>
                                
                            </div>
                            <div class="mb-3">
                                <label 0 class="form-label">Website</label>
                                <input type="text" class="form-control"  placeholder="Website" name="website" value="{{$getRecord->website}}">
                            </div>
                          
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
