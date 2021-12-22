// wbps_preview_popup wbps_open
function popupOpen() {
	document.getElementById("wbps_show_current_preview").style.display = "block";
}
// wbps_preview_popup Close
function popupClose() {
	document.getElementById("wbps_show_current_preview").style.display = "none";
}
//Overlay and Background position
jQuery(function($) {
	$(document).ready(function() {
		$("#wbps_popup_btn").click(function(e) {
			e.stopPropagation();
			$("body").addClass("wbps_stop");
			$(".wbps_preview_overlay").addClass("wbps_stop");
		});
		$("#wbps_close_button_position").click(function() {
			$("body").removeClass("wbps_stop");
			$(".wbps_preview_overlay").removeClass("wbps_stop");
			console.log('body')
		});
		$("#wbps_close_sticky_position").click(function() {
			$("body").removeClass("wbps_stop");
			$(".wbps_preview_overlay").removeClass("wbps_stop");
			console.log('body')
		});
		$(".wbps_preview_overlay").click(function() {
			$("body").removeClass("wbps_stop");
			$(".wbps_preview_overlay").removeClass("wbps_stop");
			console.log('body')
		});
	});
});

//Prevent right clicking on preview contents
jQuery(function($) {
	$(document).ready(function() {
		$("#wbps-no-click").on("contextmenu", function() {
			return false;
		});
	});
});
