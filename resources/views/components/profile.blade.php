<div id="profile" class="bg-primary text-center">
  <img src="{{ asset('image/profile.png') }}" class="circle w-75 mx-auto"></img>
  <h4>Name</h3>
  <h5>Username: </h5>
  <a href="/logout" class="btn btn-light"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
  <a href="/control-panel" class="btn btn-danger mt-2"><i class="fas fa-cogs"></i><span>Control Panel</span></a>
</div>
<div id="profile-btn" class="bg-primary">
  <h2 class="text-center my-auto"><i class="fas fa-user-circle text-light"></i></h2>
</div>

<script>
    $('#profile-btn').click(function(){
      if ($('#profile').hasClass('active')) {
        $('#profile').removeClass('active');
        $(this).removeClass('active');
        $('#profile').hide();
      }else{
        $('#profile').show();
        $('#profile').addClass('active');
        $(this).addClass('active');
      }
    });
</script>
