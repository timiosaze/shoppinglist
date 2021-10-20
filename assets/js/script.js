$(document).ready(function(){
	$('.data-list').click(function(){
		$action = $(this).children(".actions");
		$notaction = $(this).siblings().children(".actions");
		$notaction.slideUp();
		$action.slideToggle();
	});
	var $count = 0;
	$('.done').click(function(){
		$this = $(this).parents('.actions').prev();
		$this.toggleClass('text-through');
		$(this).text($(this).text() == 'Done' ? 'Undone' : 'Done');
		if($this.hasClass("text-through")) {
			$count++;
    		$("#red").text($count + " done");
		} 
		else {
			$count--;
    		$("#red").text($count + " done");
		}
		// $count++;
  //   	$("#red").html($count + " done");
	});
});