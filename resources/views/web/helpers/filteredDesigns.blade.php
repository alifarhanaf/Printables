<div class="all_my_content" style="padding-top: 1.5rem">
    {{-- <ul class="nav nav-pills my-tabs_btns" style="width:100%" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation" style="width: 50%">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">POPULAR</a>
        </li>
        <li class="nav-item" role="presentation" style="width: 50%">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">RECENT</a>
        </li>
        </ul> --}}
    <div class="tab-content mt-3 pt-5" id="pills-tabContent"  >
        <div class="tab-pane fade show active" id="pills-home"  role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="my_all_content">
                <div class="my_flex_main">
                    @foreach ($designs as $design)
                    <div class="flex_child">
                        <div class="chlidren_spacing">
                            <button type="button" id="modalBtn{{$design->id}}" data-toggle="modal" data-id="{{$design->id}}" data-target="#exampleModal{{$design->id}}">
                                <div class="popup_header">
                                    <div class="img_parent">
                                        <img src="{{ asset($design->images[0]->url)}}" alt="design" id="designID" data-id="{{$design->id}}" class="img-fluid">
                                    </div>
                                </div>
                            </button>
                            {{-- Modal 1 Start --}}
                            <div class="modal fade" id="exampleModal{{$design->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
                                    <div class="modal-content">
                                        <div class="modal-body my_custom_model">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div id="modalContent{{$design->id}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal 1 end --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="my_all_content">
                <div class="my_flex_main">
                    @foreach ($recents as $recent)
                    <div class="flex_child">
                        <div class="chlidren_spacing">
                            <button type="button" id="modalBtnRecent{{$recent->id}}" data-toggle="modal" data-id="{{$recent->id}}"  data-target="#exampleModalRecent{{$recent->id}}">
                                <div class="popup_header">
                                    <div class="img_parent">
                                        <img src="{{ asset($recent->images[0]->url)}}" alt="design" class="img-fluid">
                                    </div>
                                </div>
                            </button>
                            {{-- Modal 2 Start --}}
                            <div class="modal fade" id="exampleModalRecent{{$recent->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
                                    <div class="modal-content">
                                    <div class="modal-body my_custom_model">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        <div id="modalContentRecent{{$recent->id}}">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal 2 End--}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
        </div>
</div>