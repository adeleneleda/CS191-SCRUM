$(document).ready(function(){
        $('.tab').click(show_tab_contents);
});

function show_tab_contents(e){
      e.preventDefault();
      
     // alert('showing ' + $(this).attr('value'));
 
      old_active_tab =  $(this).siblings('.current-tab').attr('value');
      $('.tabcontent.'+old_active_tab).hide();
      $(this).siblings('.current-tab').removeClass('current-tab');

      $(this).addClass('current-tab');
      new_active_tab = $(this).attr('value');
      $('.tabcontent.'+new_active_tab).show();
}
