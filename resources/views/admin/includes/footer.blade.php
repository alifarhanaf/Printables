</div><!-- az-content-body -->


<div class="az-footer ht-40">
  <div class="container-fluid pd-t-0-f ht-100p">
    <span>&copy; 2020 TetraLogicx Private Limited</span>
  </div><!-- container -->
</div><!-- az-footer -->
</div><!-- az-content -->

<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('res/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('res/ionicons/ionicons.js') }}"></script>
<script src="{{ asset('js/azia.js') }}"></script>
{{-- <script src="{{ asset('res/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('res/jqvmap/maps/jquery.vmap.world.js') }}"></script> --}}





<script>
$(function(){
  'use strict'

  $('.az-sidebar .with-sub').on('click', function(e){
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');
  })

  $(document).on('click touchstart', function(e){
    e.stopPropagation();

    // closing of sidebar menu when clicking outside of it
    if(!$(e.target).closest('.az-header-menu-icon').length) {
      var sidebarTarg = $(e.target).closest('.az-sidebar').length;
      if(!sidebarTarg) {
        $('body').removeClass('az-sidebar-show');
      }
    }
  });


  $('#azSidebarToggle').on('click', function(e){
    e.preventDefault();

    if(window.matchMedia('(min-width: 992px)').matches) {
      $('body').toggleClass('az-sidebar-hide');
    } else {
      $('body').toggleClass('az-sidebar-show');
    }
  });

  new PerfectScrollbar('.az-sidebar-body', {
    suppressScrollX: true
  });


});
</script>
</body>