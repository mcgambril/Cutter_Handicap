/**
 * Created by Matthew on 12/29/2015.
 */

//Score Edit by Date:  Highlight a row as red when Delete? checkbox is selected
$(function () {
    $("input[type='checkbox'].delete_box").change(function(){
        if($(this).is(":checked")){
            //add functionality to make the rest of the inputs on this row disabled and cleared
            $(this).parents('tr').addClass("delete");
        }else{
            //add functionality to make the rest of the inputs on this row enabled
            $(this).parents('tr').removeClass("delete");
        }
    });
});

/*$(function () {
    var sel = document.getElementsByClassName('editCourse');
    sel.addEventListener('click', function(){
        var options = this.children;
        for(var i=0; i < this.childElementCount; i++){
            options[i].style.color = 'white';
        }
        var selected = this.children[this.selectedIndex];
        selected.style.color = 'green';
    }, false);
});*/

$('.editCourse').change(function () {
    $(this).find('option').css('background-color', 'transparent');
    $(this).find('option:selected').css('background-color', 'red');
}).trigger('change');

//datepicker widget initializer
$(function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat:  'mm/dd/yy', /*'yy-mm-dd*/
        showAnim: 'slideDown'
    });
});

//able to derive solution for the confirm pop up box through onclick using the following 2 links
//http://uly.me/codeigniter-anchor-with-onclick/
//http://stackoverflow.com/questions/24756248/codeigniter-before-submit-confirm-popup-box-using-javascript
/*function confirmHandicapUpdate() {
    return confirm("Are you sure you want to Update all Player Handicaps?");
}*/

//jquery dialog box widget initializer:  used for handicap update confirmation
//http://api.jqueryui.com/dialog/#option-autoOpen
$(function dialogHandicapUpdate(){
    //http://stackoverflow.com/questions/503093/how-can-i-make-a-redirect-page-using-jquery
    var $currentPath = window.location.pathname;        //  /handicap/update
    var $length = $currentPath.length;
    var $endPos = $length - 6;    //take 6 away b/c 'update' is 6 letters;
    var $tempPath = $currentPath.substring(0,$endPos);    //     /handicap/  b/c endPos is where the string cuts off...will not take that letter
    var $newPath = $tempPath.concat("submitUpdate");
    $( "#dialog-confirm").dialog({
        height: 200,
        draggable: true,
        modal: true,
        resizable: true,
        autoOpen: false,
        buttons: {
            "Continue": function() {
                /*$( this).dialog( "close" );*/
                window.location.href=$newPath;
            },
            Cancel: function() {
                $( this).dialog( "close" );
            }
        }
    });
    $( "#openHandicapDialog").click(function() {
        $( "#dialog-confirm").dialog( "open" );
    })
});




