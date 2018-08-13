@extends('layouts.app')
@section('content')

<div class="post-ad-area">
    <div class="post-add-main">
        <form action="">
            <div class="form-group">
                <label for="inputState">Select Division</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Dhaka</option>
                    <option>Sylhet</option>
                    <option>Rajsahi</option>
                    <option>Chattagram</option>
                    <option>Khulna</option>
                    <option>Barisal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select City</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Dhaka</option>
                    <option>Sylhe </option>
                    <option>Rajsahi</option>
                    <option>Chattagram</option>
                    <option>Khulna</option>
                    <option>Barisal</option>
                </select>
            </div>
            <div class="form-group photo-area">
                <div class="post-imgs"></div>
                <div class="item-photo">
                    <i class="fa fa-image"></i>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Add a Photo</label>
                </div>
            </div>
  
            <div class="form-group">
                <label for="inputState">Color</label>
                <input type="text" class="form-control" name="color" placeholder="Color">
            </div>
            <div class="textarea">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
                <label for="inputState">Age</label>
                <input type="text" class="form-control">
            </div>
            <div class="contact-info">
                <div class="form-group">
                    <label for="inputState">Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="inputState">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputState">Number</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Mobile number">
                </div>
                <div class="form-check form-group">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Hide the number
                    </label>
                </div>
                <div class="submit-button form-group">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection