@extends('layouts.app')
@section('content')

<div class="post-ad-area">
    <div class="post-add-main">
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputState">Select Division</label>
                <select name="division" id="division" class="form-control division_name">
                    <option disabled="true" selected="true">Choose...</option>
                    @foreach($divisions as $division)
                      <option value='{{ $division->id }}'>{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select District</label>
                <select name="district" id="district" class="form-control district_name">
                    <option disabled="true" selected="true" class="district_name_option">Choose...</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Select Thana</label>
                <select name="thana" id="thana" class="form-control thana_name">
                    <option disabled="true" selected="true">Choose...</option>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.division_name',function(){
            //console.log("hmm its change");

            var division_id = $(this).val();
            //console.log(division_id);
            var div = $(this).parent();

            var op=" ";
            console.log(op);
            $.ajax({
                type:'get',
                url:'{!!URL::to('findDivisionName')!!}',
                data:{'id':division_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
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

        // $(document).on('change','.district_name',function () {
        //     var prod_id=$(this).val();

        //     var a=$(this).parent();
        //     console.log(prod_id);
        //     var op="";
        //     $.ajax({
        //         type:'get',
        //         url:'{!!URL::to('findPrice')!!}',
        //         data:{'id':prod_id},
        //         dataType:'json',//return data will be json
        //         success:function(data){
        //             console.log("price");
        //             console.log(data.price);

        //             // here price is coloumn name in products table data.coln name

        //             a.find('.prod_price').val(data.price);

        //         },
        //         error:function(){

        //         }
        //     });


        // });

    });

</script>
@endsection