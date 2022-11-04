(function ($) {
	const bodyPage = $("body");
	const menuToggler = $(".menu__toggler");

	if ($(window).width() > 769) {
		$(".navbar .dropdown").hover(
			function () {
				$(this)
					.find(".dropdown-menu")
					.first()
					.stop(true, true)
					.delay(200)
					.slideDown();
			},
			function () {
				$(this)
					.find(".dropdown-menu")
					.first()
					.stop(true, true)
					.delay(100)
					.slideUp();
			}
		);
		$(".navbar .dropdown > a").click(function () {
			location.href = this.href;
		});
	}

	const searchForm = $("#form-search");
	$("#btn-search").on("click", function () {
		$(searchForm).slideToggle();
		$(searchForm).find("input[type=text]").focus();
		$(searchForm).find("input[type=text]").val("");
		$("#live-search-result").html("");
	});

	// Image Zoom In
	$(".latest-posts article:nth-child(1)").on("mouseover", function () {
		$(this).find(".post-bg").css("transform", "scale(1.5)");
	});

	// Image Zoom Out
	$(".latest-posts article:nth-child(1)").on("mouseout", function () {
		$(this).find(".post-bg").css("transform", "scale(1)");
	});
})(jQuery);
