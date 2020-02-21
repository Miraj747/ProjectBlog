<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name',isset($category)?$category->name:null)}}"class="form-control" id="name" placeholder="Enter Name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Status</label>
    <br>
    <label for="active">Active</label>
    <input id="Active" type="radio" name="status" @if(old('status',($category)?$category->status:null)=='Active') checked @endif >


    <br>
    <label for="inactive">Inactive</label>
    <input id="Inactive" type="radio" name="status" @if(old('status',($category)?$category->status:null)=='Inactive') checked @endif >
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
