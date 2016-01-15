(function($) {

	"use strict";

	skel.breakpoints({
		xlarge:	'(max-width: 1680px)',
		large:	'(max-width: 1280px)',
		medium:	'(max-width: 980px)',
		small:	'(max-width: 736px)',
		xsmall:	'(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
		$body = $('body'),
		$header = $('#header'),
		$banner = $('#banner');

		$body.addClass('is-loading');

		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-loading');
			}, 100);
		});

		$('form').placeholder();

		skel.on('+medium -medium', function() {
			$.prioritize(
				'.important\\28 medium\\29',
				skel.breakpoint('medium').active
				);
		});

			// Header.
			if (skel.vars.IEVersion < 9)
				$header.removeClass('alt');

			if ($banner.length > 0
				&&	$header.hasClass('alt')) {

				$window.on('resize', function() { $window.trigger('scroll'); });

			$banner.scrollex({
				bottom:		$header.outerHeight(),
				terminate:	function() { $header.removeClass('alt'); },
				enter:		function() { $header.addClass('alt'); },
				leave:		function() { $header.removeClass('alt'); }
			});

		}

			// login.
			var $login = $('#login');

			$login._locked = false;

			$login._lock = function() {

				if ($login._locked)
					return false;

				$login._locked = true;

				window.setTimeout(function() {
					$login._locked = false;
				}, 350);

				return true;

			};

			$login._show = function() {

				if ($login._lock())
					$body.addClass('is-login-visible');

			};

			$login._hide = function() {

				if ($login._lock())
					$body.removeClass('is-login-visible');

			};

			$login._toggle = function() {

				if ($login._lock())
					$body.toggleClass('is-login-visible');

			};

			$login
			.appendTo($body)
			.on('click', function(event) {

				event.stopPropagation();

					// Hide.
					$login._hide();

				})
			.find('.inner')
			.on('click', '.close', function(event) {

				event.preventDefault();
				event.stopPropagation();
				event.stopImmediatePropagation();

						// Hide.
						$login._hide();

					})
			.on('click', function(event) {
				event.stopPropagation();
			})
			.on('click', 'a', function(event) {

				var href = $(this).attr('href');

				event.preventDefault();
				event.stopPropagation();

						// Hide.
						$login._hide();

						// Redirect.
						window.setTimeout(function() {
							window.location.href = href;
						}, 350);

					});

			$body
			.on('click', 'a[href="#login"]', function(event) {

				event.stopPropagation();
				event.preventDefault();

					// Toggle.
					$login._toggle();

				})
			.on('keydown', function(event) {

					// Hide on escape.
					if (event.keyCode == 27)
						$login._hide();

				});


			// signup.
			var $signup = $('#signup');

			$signup._locked = false;

			$signup._lock = function() {

				if ($signup._locked)
					return false;

				$signup._locked = true;

				window.setTimeout(function() {
					$signup._locked = false;
				}, 350);

				return true;

			};

			$signup._show = function() {

				if ($signup._lock())
					$body.addClass('is-signup-visible');

			};

			$signup._hide = function() {

				if ($signup._lock())
					$body.removeClass('is-signup-visible');

			};

			$signup._toggle = function() {

				if ($signup._lock())
					$body.toggleClass('is-signup-visible');

			};

			$signup
			.appendTo($body)
			.on('click', function(event) {

				event.stopPropagation();

					// Hide.
					$signup._hide();

				})
			.find('.inner')
			.on('click', '.close', function(event) {

				event.preventDefault();
				event.stopPropagation();
				event.stopImmediatePropagation();

						// Hide.
						$signup._hide();

					})
			.on('click', function(event) {
				event.stopPropagation();
			})
			.on('click', 'a', function(event) {

				var href = $(this).attr('href');

				event.preventDefault();
				event.stopPropagation();

						// Hide.
						$signup._hide();

						// Redirect.
						window.setTimeout(function() {
							window.location.href = href;
						}, 350);

					});

			$body
			.on('click', 'a[href="#signup"]', function(event) {

				event.stopPropagation();
				event.preventDefault();

					// Toggle.
					$signup._toggle();

				})
			.on('keydown', function(event) {

					// Hide on escape.
					if (event.keyCode == 27)
						$signup._hide();

				});

			// contact.
			var $contact = $('#contact');

			$contact._locked = false;

			$contact._lock = function() {

				if ($contact._locked)
					return false;

				$contact._locked = true;

				window.setTimeout(function() {
					$contact._locked = false;
				}, 350);

				return true;

			};

			$contact._show = function() {

				if ($contact._lock())
					$body.addClass('is-contact-visible');

			};

			$contact._hide = function() {

				if ($contact._lock())
					$body.removeClass('is-contact-visible');

			};

			$contact._toggle = function() {

				if ($contact._lock())
					$body.toggleClass('is-contact-visible');

			};

			$contact
			.appendTo($body)
			.on('click', function(event) {

				event.stopPropagation();

					// Hide.
					$contact._hide();

				})
			.find('.inner')
			.on('click', '.close', function(event) {

				event.preventDefault();
				event.stopPropagation();
				event.stopImmediatePropagation();

						// Hide.
						$contact._hide();

					})
			.on('click', function(event) {
				event.stopPropagation();
			})
			.on('click', 'a', function(event) {

				var href = $(this).attr('href');

				event.preventDefault();
				event.stopPropagation();

						// Hide.
						$contact._hide();

						// Redirect.
						window.setTimeout(function() {
							window.location.href = href;
						}, 350);

					});

			$body
			.on('click', 'a[href="#contact"]', function(event) {

				event.stopPropagation();
				event.preventDefault();

					// Toggle.
					$contact._toggle();

				})
			.on('keydown', function(event) {

					// Hide on escape.
					if (event.keyCode == 27)
						$contact._hide();

				});

			// error.
			var $error = $('#error');

			$error._locked = false;

			$error._lock = function() {

				if ($error._locked)
					return false;

				$error._locked = true;

				window.setTimeout(function() {
					$error._locked = false;
				}, 350);

				return true;

			};

			$error._show = function() {

				if ($error._lock())
					$body.addClass('is-error-visible');

			};

			$error._hide = function() {

				if ($error._lock())
					$body.removeClass('is-error-visible');

			};

			$error._toggle = function() {

				if ($error._lock())
					$body.toggleClass('is-error-visible');

			};

			$error
			.appendTo($body)
			.on('click', function(event) {

				event.stopPropagation();

					// Hide.
					$error._hide();

				})
			.find('.inner')
			.on('click', '.close', function(event) {

				event.preventDefault();
				event.stopPropagation();
				event.stopImmediatePropagation();

						// Hide.
						$error._hide();

					})
			.on('click', function(event) {
				event.stopPropagation();
			})
			.on('click', 'a', function(event) {

				var href = $(this).attr('href');

				event.preventDefault();
				event.stopPropagation();

						// Hide.
						$error._hide();

						// Redirect.
						window.setTimeout(function() {
							window.location.href = href;
						}, 350);

					});

			$body
			.on('click', 'a[href="#error"]', function(event) {

				event.stopPropagation();
				event.preventDefault();

					// Toggle.
					$error._toggle();

				})
			.on('keydown', function(event) {

					// Hide on escape.
					if (event.keyCode == 27)
						$error._hide();

				});


			// menu.
			var $menu = $('#menu');

			$menu._locked = false;

			$menu._lock = function() {

				if ($menu._locked)
					return false;

				$menu._locked = true;

				window.setTimeout(function() {
					$menu._locked = false;
				}, 350);

				return true;

			};

			$menu._show = function() {

				if ($menu._lock())
					$body.addClass('is-menu-visible');

			};

			$menu._hide = function() {

				if ($menu._lock())
					$body.removeClass('is-menu-visible');

			};

			$menu._toggle = function() {

				if ($menu._lock())
					$body.toggleClass('is-menu-visible');

			};

			$menu
			.appendTo($body)
			.on('click', function(event) {

				event.stopPropagation();

					// Hide.
					$menu._hide();

				})
			.find('.inner')
			.on('click', '.close', function(event) {

				event.preventDefault();
				event.stopPropagation();
				event.stopImmediatePropagation();

						// Hide.
						$menu._hide();

					})
			.on('click', function(event) {
				event.stopPropagation();
			})
			.on('click', 'a', function(event) {

				var href = $(this).attr('href');

				event.preventDefault();
				event.stopPropagation();

						// Hide.
						//$menu._hide();

						// Redirect.
						window.setTimeout(function() {
							window.location.href = href;
						}, 350);

					});

			$body
			.on('click', 'a[href="#menu"]', function(event) {

				event.stopPropagation();
				event.preventDefault();

					// Toggle.
					$menu._toggle();

				})
			.on('keydown', function(event) {

					// Hide on escape.
					if (event.keyCode == 27)
						$menu._hide();

				});
		});

})(jQuery);