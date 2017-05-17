// Get the modal
var modal = document.getElementById('myModal');

// When the user clicks on the button, open the modal
$(".openModal").click(function() {
    $(modal).css("display", "block");
    var sectionid = $(this).data("sectionid");
    $('#section').val(sectionid);
    $('#comment_id').val("");
    $('#name').val("");
    $('#comment').val("");
});
//open the modal with data to edit
$('.comments').on('click', '.editOpenModal', function () {
    $(modal).css("display", "block");
    $('#required_warning').css("display", "none");
    $('.required').css('border-bottom-color', '#80878D');
    var comment_id = $(this).data('commentid');
    var comment_name = $('#comment_'+comment_id).children('h4').html();
    var comment_text = $('#comment_'+comment_id).children('p').html();

    $('#comment_id').val(comment_id);
    $('#name').val(comment_name);
    $('#comment').val(comment_text);
});

// When the user clicks on <span> (x), close the modal
$('.close').click(function() {
    $(modal).css("display", "none");
});

// When the user clicks anywhere outside of the modal, close it
$(window).click(function(event) {
    if (event.target == modal) {
        $(modal).css("display", "none");
    }
});

// Character counting
$('#comment').keyup(function () {
    var characters = this.value.length;
    $('#count').html(characters + " characters out of 500");
    if (characters > 500) {
        //show warning
        $('#count').addClass('warning');
        //make btn inactive
        $('#save').addClass('inactive');
        //make comment textarea border red
        $(this).css('border-bottom-color', 'red');
    } else {
        $('#count').removeClass('warning');
        $('#save').removeClass('inactive');
    }
});
//Increase the thumb counter when you click the thumbs up btn
$('.up').click(function() {
    var count = parseInt($.trim($(this).parent().find('.thumbs_counter').html()));
    //alert ($(this).parent().find('.thumbs_counter').html());
    if (count < 10) {
        count++
        var thumbs_counter = $(this).parent().find('.thumbs_counter');
        //increase the counter on page
        thumbs_counter.html('').append( count );
        var thumbs_section = thumbs_counter.data('thumbs');

        //Update the thumbs counter in database for the specific section
        update_thumbs(thumbs_section, count);
    }
});
//Decrease the thumb counter when you click the thumbs down btn
$('.down').click(function() {
    var count = parseInt($.trim($(this).parent().find('.thumbs_counter').html()));
    //alert (count + 3);
    if (count > 0) {
        count--
        var thumbs_counter = $(this).parent().find('.thumbs_counter');
        //decrease the counter on page
        thumbs_counter.html('').append( count );
        var thumbs_section = thumbs_counter.data('thumbs');

        //Update the thumbs counter in database for the specific section
        update_thumbs(thumbs_section, count);
    }
});
//----------------- submit the comment to database or edit the comment ---------------------
$('#save').click(function(e) {
    e.preventDefault();
    var comment_id = $.trim($('#comment_id').val());
    var section_id = $.trim($('#section').val());
    var name = $('#name').val();
    var comment = $('#comment').val();

    if(name != "" && comment != "") {
        $('#required_warning').hide();

        if ($('#comment').val().length <= 500) {
            if (comment_id == "") {

                $('.required').css('border-bottom-color', '#80878D');
                //Create comment
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $('#comment_form').serialize() + "&action=create",
                    success: function(id) {
                        //alert(id);
                        var new_comment = '<div id="comment_'+id+'" class="comment">'+
                                                '<h4>'+name+'</h4>'+
                                                '<p>'+comment+'</p>'+
                                                '<div class="edit">'+
                                                    '<button data-commentid="'+id+'" type="button" class="editOpenModal rounded">EDIT</button>&nbsp;'+
                                                    '<button data-commentid="'+id+'" type="button" class="delete rounded">DELETE</button>'+
                                                '</div>'+
                                            '</div>';

                        $('#section_'+section_id+' .comments').prepend(new_comment);
                    },
                    error: function() {
                        alert('Error');
                    }
                });
            }
            else {
                $('.required').css('border-bottom-color', '#80878D');
                //Edit comment
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $('#comment_form').serialize() + "&action=edit",
                    success: function(response) {

                        //alert(comment_id);
                        $('#comment_'+comment_id+' h4').html(name);
                        $('#comment_'+comment_id+' p').html(comment);
                    },
                    error: function() {
                        alert('Error');
                    }
                });
            }
            $('#count').html('');
            modal.style.display = "none";
        }

    } else {
        $('#required_warning').show();
        $('form .required').each(function(){
            var required = $(this);
            if(required.val() == "") {
                required.css('border-bottom-color', 'red');
            }
            else {
                required.css('border-bottom-color', '#80878D');
            }
        });
    }
    return false;
});
//-------------------- Delete comment -------------------
$('.comments').on('click', '.delete', function (){
    var comment_id = $(this).data('commentid');
    var action = "delete";

    $.ajax({
        type: "POST",
        url: "action.php",
        data: {comment_id: comment_id, action: action},
        success: function(response) {
            //alert(response);
            $('#comment_'+comment_id).remove();
        },
        error: function() {
            alert('Error');
        }
    });
});

//function to update thumbs count in database
function update_thumbs(thumbs_section, count) {
    var action = "thumbs_update";
    $.ajax({
        type: "POST",
        url: "action.php",
        data: {section_id: thumbs_section, thumbs: count, action: action},
        success: function(response) {
            //alert(response);
        },
        error: function() {
            alert('Error');
        }
    });
}
