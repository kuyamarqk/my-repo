
    $( "#click" ).click(function() {
        alert( "Handler for .click() called." )
      });
      $( "#hide" ).click(function() {
        $("#to-be-hide").hide();
      });
      $( "#show" ).click(function() {
        $("#to-be-show").show();
      });
      $( "#toggle" ).click(function() {
        $("p").toggle();
      });
      $( "#slideDown" ).click(function() {
        if ( $( "#to-be-slideDown").first().is( ":hidden" ) ) {
            $("#to-be-slideDown").slideDown( "slow" );
          } else {
            $("#to-be-slideDown").hide();
          }
      });
      $( "#slideUp" ).click(function() {
        if ( $( "#to-be-slideUp" ).first().is( ":hidden" ) ) {
            $( "#to-be-slideUp" ).show( "slow" );
          } else {
            $( "#to-be-slideUp" ).slideUp();
          }
      });
      $( "#slideToggle" ).click(function() {
        $("#to-be-slideToggle").slideToggle('slow');
      });
      $("#fadeIn").click(function(){
        $( "#to-be-fadeIn" ).fadeIn( 3000, function() {
            $( "span" ).fadeIn( 100 );
          });
          return false;
      });
      $("#fadeOut").click(function(){
        $( "#to-be-fadeOut" ).fadeOut( 3000, function() {
            $( "span" ).fadeOut( 100 );
          });
          return false;
      });
      $( "#before" ).before( "<b>Hello</b>" );

      $( "#after" ).after( "<b>Hello</b>" );

      $( "#append" ).append( "<strong>Hello</strong>" );

      $('#html').click(function(){
        var htmlString = $( this ).html();
        $( "#html-display" ).text( htmlString );
      });

      $( "input" ).change(function() {
            var $input = $( this );
            $( "#check").html( ".attr( 'checked' ): <b>" + $input.attr( "checked" ) + "</b><br>" +
            ".prop( 'checked' ): <b>" + $input.prop( "checked" ) + "</b><br>" +
            ".is( ':checked' ): <b>" + $input.is( ":checked" ) + "</b>" );
        }).change();
        function displayVals() {
            var singleValues = $( "#single" ).val();
            var multipleValues = $( "#multiple" ).val() || [];
            // When using jQuery 3:
            // var multipleValues = $( "#multiple" ).val();
            $( "#display" ).html( "<b>Single:</b> " + singleValues +
              " <b>Multiple:</b> " + multipleValues.join( ", " ) );
          }
           
          $( "select" ).change( displayVals );
          displayVals();
    var str = $('#text').first().text();
    $('#copy').last().html(str);


    