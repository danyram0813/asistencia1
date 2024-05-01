var csrfToken = $('meta[name=csrf-token]').attr('content');

//confirma pagos de recfinancieros
function confirmarVigente(id) {
    $.post('/cicloescolar/confirmar', { _csrf: csrfToken, datos: { id: id } })
      .done(function (d) {
        $.pjax.reload({container:'#cicloescolar-grid'});
        //krajeeDialog.alert(d);
      }).fail(function (f) { console.log(f.responseText); });
  };

  function confirmarCiclo(id) {
    $.post('/periodo/confirmar', { _csrf: csrfToken, datos: { id: id } })
      .done(function (d) {
        $.pjax.reload({container:'#periodo-grid'});
        //krajeeDialog.alert(d);
      }).fail(function (f) { console.log(f.responseText); });
  };
