@include('web.includes.header')
@include('web.includes.subheader')

<form action="{{ route('setDesignDetailCookie') }}" method="POST" >
<section class="header_beneath single__product_selected">
    <div class="container" >
        <div class="my_nav">
            <div class="row under_nav">
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>1</span>
                            </div>
                            Chose a product
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-block m-auto">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>2</span>
                            </div>
                           Design Description
                        </a>
                    </div>
                </div>
                <div class="col-lg-2  col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>3</span>
                            </div>
                            Print Type
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>4</span>
                            </div>
                            Delivery
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>5</span>
                            </div>
                            Review
                        </a>
                    </div>
                </div>
            </div>
            
        </div> 
       
        <div class="row">
            <div class="col-md-6 col-10 m-auto d-block">
                <div class="main_image_selected">
                    <div class="image_spacing_main">
                        <img src="{{ asset($product[0]->images[0]->url)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            
                 {{ csrf_field() }}
            <div class="col-md-6 col-10 m-auto d-block">
                <div class="mian_image_aboutSection">
                    <div class="main__imageDiscription">
                        <div class="compainName">
                            <label for="CompName" class="main_labels">
                                Name Your Compaign
                            </label>
                            <input type="text" class="form-control form_class" name="CampaignName" id="CompName">
                        </div>
                        <div class="Select_Boxes">
                            <div class="all_print_location">
                                <label class="main_labels">
                                    Select printed location
                                </label>
                                <div class="allLocations">
                                    @foreach ($product[0]->print_locations as $PL)
                                   
                                        
                                    
                                    <div class="printLocation_name">
                                    <input type="checkbox" name="printLocations[]" id="front" value="{{$PL->id}}" >
                                    
                                    <label for="front">{{$PL->name}}</label>
                                    </div>
                        
                                    
                                   

                                   

                                    @endforeach
                                    {{-- <div class="printLocation_name">
                                        <input type="checkbox" id="Pocket" name="LocationPrint" >
                                        <label for="Pocket">Pocket</label>
                                       
                                    </div>
                                    <div class="printLocation_name">
                                        <input type="checkbox" id="Back" name="LocationPrint">
                                        <label for="Back">Back</label>
                                    </div>
                                    <div class="printLocation_name">
                                        <input type="checkbox" id="Sleeve" name="LocationPrint">
                                        <label for="Sleeve">Sleeve</label>
                                    </div> --}}

                                </div> 
                            </div>
                        </div>
                        <div class="PageInfo">
                            <p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, recusandae.</em></p>
                        </div>
                        @for($i=0;$i<count($printLocations);$i++)

                        <div id="testview{{$i}}" class="DiscribePrint" style="display: none" >
                            <label id="label{{$i}}" for="discribe" class="main_labels">
                                What You want on your Front
                            </label>
                            <div class="main__discribe">
                                <textarea id="discribe" name="suggestions[]" cols="20" rows="5" class="form-control form_class" 
                                placeholder="1. Please add notes/changes you need a numbered list.&#10;2. Please try to keep your notes concise.&#10;3. Please make sure to write the exact text you want on the shirt (event     name, date, venue, letters, school, chapter, sponors,etc"></textarea>
                            </div>
                        </div>
                    <div id="numSelect{{$i}}" class="number_Colors" style="display: none">
                            <label for="Numbers" class="main_labels">
                                No. of colors
                            </label>
                            <select name="SelectColors[]" id="Numbers" class="form-control form_class">
                                <option value=""> Select Colors</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        @endfor
                        
                     
                        <div class="UploadImages">
                            <div class="upload-btn-wrapper">
                                <div class="upload_image">
                                    <img src="{{ asset($design[0]->images[0]->url)}}" alt="" class="img-fluid" id="fileUpload" style="max-width: 100px;height: 100px;" >
                                </div>
                                <input type="file" name="myfile" accept="image/*" data-type='image' class="image_checker" />
                            </div>
                            <div class="upload-btn-wrapper">
                                <div class="upload_image">
                                    <img src="{{ asset('storage/images/wizard 2/4.png')}}" alt="" class="img-fluid" id="fileUpload" style="max-width: 100px;height: 100px;">
                                </div>
                                <input type="file" name="myfile" accept="image/*" data-type='image' class="image_checker" />
                            </div>
                            <div class="upload-btn-wrapper">
                                <div class="upload_image">
                                    <img src="{{ asset('storage/images/wizard 2/4.png')}}" alt="" class="img-fluid" id="fileUpload" style="max-width: 100px;height: 100px;">
                                </div>
                                <input type="file" name="myfile" accept="image/*" data-type='image' class="image_checker" />
                            </div>
                        </div>
                        <div class="next__btn">
                            <button type="submit">
                          <a type="submit" class="btn my-btn">Next</a>
                            </button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        


  


    </div>
</section>


</form>






@include('web.includes.subfooter')
@include('web.includes.footer')
<script>

$(document).ready(function(){
    $.ajax({
            url: 'allPrintLocations',
            type: 'get',
            success: function(response){ 
          
$('.printLocation_name label').click(function(event){

    var checkNow = $(this).parent('.printLocation_name').find('input')
    if(checkNow.attr('checked')) { 
        for ( var i = 0, l = response.length; i < l; i++ ) {
            if(checkNow.val() == response[i].id ){
                checkNow.removeAttr('checked','checked')
                document.getElementById("testview"+i).style.display = "none";
                document.getElementById("numSelect"+i).style.display = "none";
            }
        }
    }else{
        for ( var i = 0, l = response.length; i < l; i++ ) {
                    if(checkNow.val() == response[i].id){
                        checkNow.attr('checked','checked')
                    document.getElementById("testview"+i).style.display = "block";
                    document.getElementById("numSelect"+i).style.display = "block";
                    document.getElementById("label"+i).innerHTML = 'Describe what you would like designed on the '+ response[i].name +' of the shirt.';
                    }
                }
    }
      
  });
}
    });
});
</script>
@include('web.includes.endfile')