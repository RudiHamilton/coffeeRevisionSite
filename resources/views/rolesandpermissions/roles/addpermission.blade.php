<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('roles')}}" class="btn btn-primary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{url('roles/'.$role->id.'/addpermission')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h2>Role : {{$role->name}}</h2>
                            <label for="permission">Permissions</label>
                            
                            <div class="ml-5 mb-3">
                                @error('permission')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                                @foreach ($permissions as $permission)
                                    <div class="row mt-4">
                                        <label for="">
                                            <input 
                                                type="checkbox"
                                                name="permission[]" 
                                                value="{{$permission->name}}"
                                                {{in_array($permission->id,$rolePermission) ? 'checked':''}}
                                            />
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
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