$(function(){

		var menu_activado= false;

		$('.icono-menu').click(function(e){
			if (!menu_activado) {

				$('.menu-modal-fastinfo').animate({top:'10%'},300,function(){					
				menu_activado=true;
			});
			}
			else{
				$('.menu-modal-fastinfo').animate({top:'-50%'},300,function(){					
				menu_activado=false;
			});
			}
			
		});

		
})