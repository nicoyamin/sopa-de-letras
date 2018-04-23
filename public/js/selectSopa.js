$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

var matrix = {
	0:[
		["O","I","E"],
		["I","I","X"],
		["E","X","E"]
		],
	1:[
		["E","I","O","I","E","I","O","E","I","O"]
		],
	2:[
		["E","A","E","A","E"],
		["H","I","I","I","H"],
		["E","I","O","I","E"],
		["A","I","I","I","A"],
		["E","A","E","A","E"]
		],
	3:[
		["O","X"],
		["I","O"],
		["E","X"],
		["I","I"],
		["O","X"],
		["I","E"],
		["E","X"]
		]

}

$(document).ready(function(){
	$(".matrix").mouseover(function(){
		$(this).css("border", "2px solid black");
		$(this).css("border-radius", "5px");
	});
	$(".matrix").mouseout(function(){
		$(this).css("border", "");
	});
	$(".matrix").click(function(){
		$(".matrix").fadeIn(1000)
		$(".solution").fadeOut(500)

		var selectedMatrix=parseInt($(this).attr("id"));
		var keyword=$("#keyword").val();
		var messagePost=$(this).siblings();
		$.ajax({
			method:'POST',
			url:url,
			data: {matrix:matrix[selectedMatrix], keyword:keyword}

		})
		.done(function(response){

			messagePost.html(response);
		});
		$(this).fadeToggle(1000, function(){
			$(this).siblings().fadeToggle(1000);
		});
	});

});