// Trigger

$(function () {
  var $range = $(".js-range-slider"),
    $inputFrom = $(".js-input-from"),
    $inputTo = $(".js-input-to"),
    instance,
    min = 0,
    max = 10000,
    from = 0,
    to = 10000;

  $range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
    from: 0,
    to: 10000,
    prefix: "",
    onStart: updateInputs,
    onChange: updateInputs,
    step: 5,
    prettify_enabled: true,
    prettify_separator: " ",
    values_separator: " - ",
    force_edges: true,
  });

  instance = $range.data("ionRangeSlider");

  function updateInputs(data) {
    from =  data.from + "Kč";
    to = data.to + "Kč";

    $inputFrom.prop("value", from);
    $inputTo.prop("value", to);   
    
    $("#prange").val(data.from + "," + data.to); 
    $("#prange").trigger('change');   
  }

  $inputFrom.on("input", function () {
    var val = $(this).prop("value");

    // validate
    if (val < min) {
      val = min;
    } else if (val > to) {
      val = to;
    }

    instance.update({
      from: val,
    });
  });

  $inputTo.on("input", function () {
    var val = $(this).prop("value");    

    // validate
    if (val < from) {
      val = from;
    } else if (val > max) {
      val = max;
    }

    instance.update({
      to: val,
    });
  });
});