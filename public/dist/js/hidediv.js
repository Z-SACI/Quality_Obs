function hidediv1() {
  // console.log("hidediv "+n);
  var x = document.getElementById("hidediv1");
  var y = document.getElementById("input1");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    $(y).find('#input11').removeAttr('name');
    $(y).find('#input12').removeAttr('name');
    $(x).find('#input13').prop('name','elem_id');
    $(x).find('#input14').prop('name','elem_nom');
  }  
}
function hidediv2() {
  // console.log("hidediv "+n);
  var x = document.getElementById("hidediv2");
  var y = document.getElementById("input2");
  var r2 = document.getElementById("rowhide2");
  var r1 = document.getElementById("rowhide1");
  if (x.style.display === "none") {
    x.style.display = "block";
    $(y).find('#prelev').removeAttr('name');
    y.style.display = "none";
    $(x).find('#input22').prop('name','pe_id');
  }  
  
  r1.style.display = "none";
  r2.style.display = "none";
}
function hidediv3(){
  var e = document.getElementById("prelevement_e");
  var c = document.getElementById("prelevement_c");
} 
function annuler2() {
  var x = document.getElementById("hidediv2");
  var y = document.getElementById("input2");
  var r2 = document.getElementById("rowhide2");
  var r1 = document.getElementById("rowhide1");
  if (x.style.display === "block") {
      x.style.display = "none";
      $(y).find('#prelev').prop('name','pe_id');
      y.style.display = "block";
      $(x).find('#input22').removeAttr('name');
  }
  
  r2.style.display = "block";
  r1.style.display = "block";
}
onclick="buttons({{$row->elem_id}})"
function buttons(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
    
  } 
  else if (x.style.display === "block") {
    x.style.display = "none";
    x.style.transitionDuration=".4s";
  }
}

$(".add_eprv").on('change', function() {
  var numDivs = $(this).val();
  var i;
  var html ='';
  for (i = 1; i <= numDivs; i += 1) {
  html += '\
    <h5 class="col-sm-12 "><b>Eprouvette N°'+ i+'</b></h5>\
  <div class="form-group row mr-2 ml-2 " >\
  <label for="elem_ouvrage" class="col-sm-2 col-form-label">Référence Laboratoire</label>\
  <div class="col-sm-4">\
      <input type="text" class="form-control"  placeholder="Introduisez le Code"  name="epr_ref[]" value="NULL">\
  </div>\
  <label for="elem_ouvrage" class="col-sm-2 col-form-label">Date d\'Ecrasement</label>\
  <div class="col-sm-4">\
      <input type="date" class="form-control"  placeholder="Introduisez le Code" name="epr_date_ecras[]" value="NULL">\
  </div>\
</div>\
<div class="form-group row mr-2 ml-2 " >\
  <label for="elem_ouvrage" class="col-sm-2 col-form-label">Type d\'Eprouvette</label>\
  <div class="col-sm-4">\
      <select name="epr_type[]" class="form-control test" id="">\
        @include("types_template")\
          @foreach($types as $typ)\
              <option value="1" selected>Cubique</option>\
              <option value="2">Cylindrique</option>\
          @endforeach\
      </select>\
  </div>\
  <label for="elem_ouvrage" class="col-sm-2 col-form-label">Contrainte FCI</label>\
  <div class="col-sm-4">\
      <input type="text" class="form-control"  placeholder="Introduisez le Code" name="epr_fci[]" value="NULL">\
  </div>\
</div><hr>';  }
   $('.eprv').empty().append(html);
});

// Lhih slider
$(document).ready(function() {

  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var current2 = 1;
  var steps = $('form').children('fieldset').length;
  var steps2 = $('#hidediv2').children('fieldset').length;
  // console.log(steps2);

  setProgressBar(current);
  setProgressBar2(current2);

  $(".next").click(function() {

      current_fs = $(this).parent();
      current_fs2 = $(this).parent().parent().parent();
      console.log(current_fs2);

      // console.log(current_fs2[0]);
      next_fs = $(this).parent().next();

      //Add Class Active
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate({
          opacity: 0
      }, {
          step: function(now) {
              // for making fielset appear animation
              opacity = 1 - now;

              current_fs.css({
                  'display': 'none',
                  'position': 'relative'
              });
              next_fs.css({
                  'opacity': opacity
              });
          },
          duration: 500
      });
      if (current_fs2.is("div#msform.msform")) {
          setProgressBar2(++current2);
      } else {
          setProgressBar(++current);
      }

  });

  $(".previous").click(function() {

      current_fs = $(this).parent();
      current_fs2 = $(this).parent().parent().parent();
      previous_fs = $(this).parent().prev();

      //Remove class active
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();

      //hide the current fieldset with style
      current_fs.animate({
          opacity: 0
      }, {
          step: function(now) {
              // for making fielset appear animation
              opacity = 1 - now;

              current_fs.css({
                  'display': 'none',
                  'position': 'relative'
              });
              previous_fs.css({
                  'opacity': opacity
              });
          },
          duration: 500
      });
      if (current_fs2.is("div#msform.msform")) {
        // if(current2 == 1 ){
          // setProgressBar(--current);
        // }else{
          setProgressBar2(--current2);
        // }
                                 
      } else {
        setProgressBar(--current);
      }

  });

  

  function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $('form').children('.progress').children(".progress-bar").css("width", percent + "%");
  }

  function setProgressBar2(curStep) {
      var percent2 = parseFloat(100 / steps2) * curStep;
      percent2 = percent2.toFixed();
      $('#msform').children('#hidediv2').children('.progress').children(".progress-bar").css("width", percent2 + "%");
  }

  $(".submit").click(function() {
      return false;
  })
  
});
function simulclick(id) {
  document.getElementById(id).click();
}