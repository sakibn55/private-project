@extends('layouts.app')
@section('style')
#upload_button input[type=file] {
  display:none;
}
@endsection
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
<div class="post-ad-area">
    <div class="post-add-main">
        <form action="{{ route('productStore') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputState">TITLE</label>
                <input type="text" name="title" class="form-control" placeholder="Titlle" required>
            </div>
            <div class="form-group">
                <label for="inputState">Select Categories</label>
                <select name="categories" id="category" class="form-control category_name" required>
                    <option disabled="true" selected="true">Choose...</option>
                    @foreach($categories as $category)
                      <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select Division</label>
                <select name="division" id="division" class="form-control division_name" required>
                    <option disabled="true" selected="true">Choose...</option>
                    @foreach($divisions as $division)
                      <option value='{{ $division->id }}'>{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select District</label>
                <select name="district" id="district" class="form-control district_name" required>
                    <option disabled="true" selected="true" class="district_name_option">Choose...</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select Thana</label>
                <select name="thana" id="thana" class="form-control thana_name" required>
                    <option disabled="true" selected="true">Choose...</option>
                </select>
            </div>
            <div class="form-group photo-area">
                <div id="upload_button" class="input-group control-group increment" style="display: inline-block;">
                  <label>
                    <input onchange="previewFileOne()" id="uploadImageOne" type="file" name="filename[]" class="form-control" required title="Upload Image"><span class="btn btn-primary">Upload Image</span>
                    <div class="col-sm-3"><img class="img-responsive" id="imageOne" src="" /></div>
                </div>
            </div> 
             <div class="form-group photo-area">
                <div id="upload_button" class="input-group control-group increment" style="display: inline-block;">       
                  </label>
                  <label>
                    <input onchange="previewFileTwo()" id="uploadImageTwo" type="file" name="filename[]" class="form-control" ><span class="btn btn-primary">Upload Image</span>
                    <div class="col-sm-3"><img class="img-responsive" id="imageTwo" src=""   /></div>
                  </label>
              </div>
            </div>
            <div class="form-group photo-area">
                <div id="upload_button" class="input-group control-group increment" style="display: inline-block;">
                  <label>

                    <input onchange="previewFileThree()" id="uploadImageThree" type="file" name="filename[]" class="form-control" ><span class="btn btn-primary">Upload Image</span>
                    <div class="col-sm-3"><img class="img-responsive" id="imageThree" src=""  /></div>
                  </label>
                
                </div>
            </div>

            <div class="form-group">
                <label for="inputState">Color</label>
                <input type="text" class="form-control" name="color" placeholder="Color">
            </div>
            <div class="textarea">
                <label for="comment">Description:</label>
                <textarea class="form-control" name="description" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
                <label for="inputState">Months of age</label>
                <input type="number" name="age" class="form-control" placeholder="Enter the month of age">
            </div>
            <div class="contact-info">
                <div class="form-group">
                    <label for="inputState">Name</label>
                    <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="inputState">Contact Number</label>
                    <input type="number" name="number" class="form-control" id="inputEmail4" placeholder="Mobile number">
                </div>
                <div class="submit-button form-group">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.division_name',function(){
            console.log("hmm its change");

            var division_id = $(this).val();
            console.log(division_id);
            var div = $(this).parent();

            var op=" ";
            console.log(op);
            $.ajax({
                type:'get',
                url:'{!!URL::to('findDivisionName')!!}',
                data:{'id':division_id},
                success:function(data){
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op+='<option value="0" selected disabled>choose District</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    //console.log(op+='<option value="'+data[i].id+'">'+data[i].name+'</option>');
                   }

                   //div.find('#district').html(" ");
                   //div.find('#district').append(op);
                   $("#district").html(op);
                },
                error:function(){

                }
            });
        });

        $(document).on('change','.district_name',function(){
            //console.log("hmm its change");

            var division_id = $(this).val();
            //console.log(division_id);
            var div = $(this).parent();

            var op=" ";
            //console.log(op);
            $.ajax({
                type:'get',
                url:'{!!URL::to('findDistrictName')!!}',
                data:{'id':division_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>Choose Area</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    //console.log(op+='<option value="'+data[i].id+'">'+data[i].name+'</option>');
                   }

                   //div.find('#district').html(" ");
                   //div.find('#district').append(op);
                   $("#thana").html(op);
                },
                error:function(){

                }
            });
        });

        

    });
   function previewFileOne(){
       var preview = document.querySelector('#imageOne'); //selects the query named img
       var file    = document.querySelector('#uploadImageOne').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }
   function previewFileTwo(){
       var preview = document.querySelector('#imageTwo'); //selects the query named img
       var file    = document.querySelector('#uploadImageTwo').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }   function previewFileThree(){
       var preview = document.querySelector('#imageThree'); //selects the query named img
       var file    = document.querySelector('#uploadImageThree').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }
  previewFileOne();
  previewFileTwo();
  previewFileThree();
</script>
@endsection