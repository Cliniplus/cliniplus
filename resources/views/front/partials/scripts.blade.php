<script src="{{asset('front/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

<!-- Slick JS -->
<script src="{{asset('front/js/slick.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('front/js/script.js')}}"></script>

<script>
  // وضع الاستماع على الأزرار لتبديل العرض
  $('.arrow').click(function () {
    $(this).parent().next('.answer').toggle();
  });
  $(document).ready(function() {
  $('.clients-slider').slick({
    autoplay: true,
    arrows: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1
  });
});
</script>

<script src="{{asset('front/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('front/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('front/plugins/select2/js/select2.min.js')}}"></script>

<!-- Dropzone JS -->
<script src="{{asset('front/plugins/dropzone/dropzone.min.js')}}"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{asset('front/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

<!-- Profile Settings JS -->
<script src="{{asset('front/js/profile-settings.js')}}"></script>

<script>
  function handleCheckboxChange(checkbox) {
  const checkboxes = document.getElementsByName('gender_type');
  // Uncheck all other checkboxes
  checkboxes.forEach((box) => {
    if (box !== checkbox) {
      box.checked = false;
    }
  });
  }
</script>
<script>
  function handleCheckboxChange1(checkbox) {
  const checkboxes = document.getElementsByName('select_specialist');
  // Uncheck all other checkboxes
  checkboxes.forEach((box) => {
    if (box !== checkbox) {
      box.checked = false;
    }
  });
  }
</script>

<script>
  function addTime() {
      var fromTime = document.getElementById('fromTime').value;
      var toTime = document.getElementById('toTime').value;

      var timeSlot = fromTime + ' - ' + toTime;

      if (!isTimeSlotExists(timeSlot)) {
          var button = document.createElement('button');
          button.setAttribute('type', 'button');
          button.setAttribute('class', 'btn btn3 btn-dark');
          button.innerHTML = timeSlot + ' <i class="fa-solid fa-xmark text-muted ps-2"></i>';
          button.onclick = removeButton;

          document.getElementById('timeSlots').appendChild(button);
      }
  }

  function isTimeSlotExists(timeSlot) {
      var timeSlots = document.getElementById('timeSlots').getElementsByTagName('button');
      for (var i = 0; i < timeSlots.length; i++) {
          if (timeSlots[i].innerHTML.includes(timeSlot)) {
              return true;
          }
      }
      return false;
  }

  function removeButton() {
      this.remove();
  }
</script>






