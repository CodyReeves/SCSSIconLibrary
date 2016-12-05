<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <link rel="icon" href="../assets/img/ico/favicon.ico">
    <title>SVGenerate</title>
    <meta name="description" content="">
    <meta name="author" content="Cody Reeves">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" media="none">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-4">
        <h4>SVG To Convert To Include</h4>
        <form>
          <div class="form-group">
            <textarea id="text" class="form-control" rows="26" value=""></textarea>
          </div>
          <span id="convert" class="btn btn-primary">CONVERT!</span>
          <span id="reset" class="btn btn-warning">Reset</span>
        </form>
      </div>
      <div class="col-xs-8">
        <h4>Converted SVG Include</h4>
        <code style="padding: 0;">
          <pre id="output" style="min-height: 80vh;"></pre>
          <p>
            <b>WARNING: This is highly experimental!</b>
          </p>
        </code>
      </div>
    </div>
    <div class="row">
      <div class="style">
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

// Outputs text
$( "#convert" ).click(function() {
   var text = $("#text").val();
   var converted = convertToScss(text);
   $( "#output" ).append( converted );
});

$( "#reset" ).click(function() {
  $("#output").empty();
  $("#text").val('');
  console.log('reset');
});

// Simple find and replace function
function replaceAll(string, pattern, replacement) {
    return string.replace(new RegExp(pattern, "g"), replacement);
}

// Super quick and dirty way of replacing text to convert over to scss mixin
function convertToScss(str) {
  var step = replaceAll(str, "</g>", "}");
  var step0 = replaceAll(step, "</svg>", "}");
  var step1 = replaceAll(step0, "/>", ");");
  var step2 = replaceAll(step1, "=", ":");
  var step3 = replaceAll(step2, "<svg ", "@include svg('svg',(");
  var step4 = replaceAll(step3, "<g ", "@include svg('g',(");
  var step5 = replaceAll(step4, "<path ", "@include svg('path',(");
  var step6 = replaceAll(step5, "<rect ", "@include svg('rect',(");
  var step7 = replaceAll(step6, "<polygon ", "@include svg('polygon',(");
  var step8 = replaceAll(step7, "<circle ", "@include svg('circle',(");
  var step9 = replaceAll(step8, '">', '")) {');
  var step10 = replaceAll(step9, 'xml:space', '"xml:space"');
  var step11 = replaceAll(step10, 'xmlns:"http://www.w3.org/2000/svg"', '');
  var step12 = replaceAll(step11, 'xmlns:xlink:"http://www.w3.org/1999/xlink"', '');
  var step13 = replaceAll(step12, '"', "'");
  var step14 = replaceAll(step13, '  ', '');
  return step14;
}
</script>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="29" height="30" viewBox="0 0 29 30" xml:space="preserve">
  <g transform="translate(-90 -620)">
    <g xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="business-man-7">
      <path d="M102,649h5c0.553,0,1-0.447,1-1v-9c1.104,0,2-0.896,2-2v-7c0-1.104-0.896-2-2-2h-1.055c0.649-0.635,1.055-1.52,1.055-2.5    c0-1.934-1.566-3.5-3.5-3.5s-3.5,1.566-3.5,3.5c0,0.98,0.405,1.865,1.055,2.5H101c-1.104,0-2,0.896-2,2v7c0,1.104,0.896,2,2,2v9    C101,648.553,101.447,649,102,649z M102,625.5c0-1.379,1.121-2.5,2.5-2.5s2.5,1.121,2.5,2.5s-1.121,2.5-2.5,2.5    S102,626.879,102,625.5z M100,637v-7c0-0.552,0.448-1,1-1h7c0.552,0,1,0.448,1,1v7c0,0.552-0.448,1-1,1v-6h-1v16h-2v-10h-1v10h-2    v-16h-1v6C100.448,638,100,637.552,100,637z"/>
      <rect x="104" y="630" width="1" height="1"/>
      <rect x="104" y="632" width="1" height="4"/>
    </g>
  </g>
</svg>

</body>
</html>
