(function($){
    //	console.log('jquery activated !');
        $('#form-srch').keyup(function(event){
            //console.log('Search change!');
            var input = $(this);
            var val = input.val();
            console.log(val);
            if(val == '')
            {
                console.log('vide');
                $('#AffichageListe .liste').show();
                return true;
            }
            var regexp ='\\b(.*)';
            for(var i in val)
            {
                regexp += '('+val[i]+')(.*)';
            }	
            regexp += '\\b';
            //console.log(regexp);
            $('#AffichageListe').find('span').each(function()			
            {
                var span = $(this);
    //			console.log(span);
                var resultats = span.text().match(new RegExp(regexp,'i'));
                if(resultats){
    //				console.log(resultats);
                    span.parent().parent().parent().show();
                }else{
                    //console.log(resultats);
                    span.parent().parent().parent().hide();
                }
            });
        });
    })(jQuery);