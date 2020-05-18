var user_id=0;
var group_id=0;
function set_user_id(u_id, g_id){
  user_id=u_id;
  group_id=g_id;
  var postdata={
    'group_id': group_id,
    'user_id': user_id
  }




}

$(document).ready(function (){

  $('input:radio').click(function (){
    var group_id=$("#group_id").val();
    var postdata={
      'group_id': group_id,
      'user_id': $(this).attr("id")
    }
    
  });

  $("#optionen .delete").click(function (){
    $('#exampleModal form').attr("action",$(this).attr('id'));
  });


});
