var boutique_designer_shop_Keyboard_loop = function (elem) {
  var boutique_designer_shop_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var boutique_designer_shop_firstTabbable = boutique_designer_shop_tabbable.first();
  var boutique_designer_shop_lastTabbable = boutique_designer_shop_tabbable.last();
  boutique_designer_shop_firstTabbable.focus();

  boutique_designer_shop_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      boutique_designer_shop_firstTabbable.focus();
    }
  });

  boutique_designer_shop_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      boutique_designer_shop_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};