@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>profile</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
             
                        <tr>
                        <!-- Input fields -->
                        <td>staffNo:"{{ $data->StaffNo }}"</td><br>
                        
                         <td> "{{ $data->Names }}"</td><br>

                        <td> "{{ $data->email }}"</td><br>
                            </tr>                      <!-- End of input fields -->
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</section>
@endsection
