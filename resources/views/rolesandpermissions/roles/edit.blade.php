<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Role
                            <a  class="btn btn-primary float-end" href="{{ url('roles')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('roles/'.$roles->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="permission">Role Name</label>
                                <input name="name" value="{{$roles->name}}"class="form-control" type="text"/>
                                <button type="submit"></button>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>