jQuery(function($){
  $(document).on('click','.reset-media-btn',function(e){
    e.preventDefault();
    var btn = $(this), row = btn.closest('.reset-media-row'), input = row.find('.reset-media-url');
    var kind = btn.data('type');
    var isVideo = kind === 'video';
    var libType = isVideo ? 'video' : (kind === 'file' ? ['application/pdf', 'image'] : 'image');
    var frame = wp.media({ title:'Elegir archivo', multiple:false, library:{ type: libType } });
    frame.on('select',function(){
      var att = frame.state().get('selection').first().toJSON();
      input.val(att.url).trigger('change');
      var wrap = btn.closest('.reset-product-row, .reset-field');
      var prev = wrap.find('.reset-preview');
      if (prev.length) {
        if (prev.is('img')) prev.attr('src', att.url);
      } else if (kind === 'image') {
        $('<img class="reset-preview" alt="">').attr('src', att.url).insertAfter(row);
      }
    });
    frame.open();
  });

  function baseName(list){
    var first = list.find('input, textarea').first().attr('name');
    if (first) return first.replace(/\[\d+\]\[[^\]]+\]$/, '');
    return 'reset_content_inicio[grid_products]';
  }
  function reindex(list, singular){
    list.find('.reset-product-row').each(function(i){
      $(this).find('.reset-product-top strong').text(singular + ' ' + (i + 1));
      $(this).find('input, textarea').each(function(){
        var n = $(this).attr('name');
        if (n) $(this).attr('name', n.replace(/\[\d+\]/, '[' + i + ']'));
      });
    });
  }

  // Productos grid
  $(document).on('click', '.reset-product-add', function(e){
    e.preventDefault();
    var list = $(this).closest('.reset-field').find('.reset-products').first();
    var idx = list.find('.reset-product-row').length;
    var base = baseName(list);
    var row = $('<div class="reset-product-row">'
      + '<div class="reset-product-top"><strong>Producto ' + (idx + 1) + '</strong> <button type="button" class="button reset-product-remove">Quitar</button></div>'
      + '<label>Nombre</label><input type="text" name="' + base + '[' + idx + '][name]" value="" class="regular-text" placeholder="Reset Matcha">'
      + '<label>Descripción</label><input type="text" name="' + base + '[' + idx + '][desc]" value="" class="regular-text" placeholder="Matcha latte frío con…">'
      + '<label>Imagen</label><div class="reset-media-row"><input type="url" name="' + base + '[' + idx + '][image]" value="" placeholder="https://…" class="regular-text reset-media-url"> <button type="button" class="button reset-media-btn" data-type="image">Subir / elegir</button></div>'
      + '</div>');
    list.append(row);
  });

  $(document).on('click', '.reset-product-remove', function(e){
    e.preventDefault();
    var list = $(this).closest('.reset-products');
    if (list.find('.reset-product-row').length <= 1) {
      list.find('input').val('');
      list.find('.reset-preview').remove();
      return;
    }
    $(this).closest('.reset-product-row').remove();
    reindex(list, list.data('kind') === 'belief' ? 'Creencia' : 'Producto');
  });

  // Creencias (Our Story)
  $(document).on('click', '.reset-belief-add', function(e){
    e.preventDefault();
    var list = $(this).closest('.reset-field').find('.reset-beliefs').first();
    var idx = list.find('.reset-product-row').length;
    var base = baseName(list);
    var row = $('<div class="reset-product-row">'
      + '<div class="reset-product-top"><strong>Creencia ' + (idx + 1) + '</strong> <button type="button" class="button reset-belief-remove">Quitar</button></div>'
      + '<label>Título</label><input type="text" name="' + base + '[' + idx + '][title]" value="" class="regular-text" placeholder="CLEAN ENERGY">'
      + '<label>Descripción</label><textarea name="' + base + '[' + idx + '][desc]" rows="2" placeholder="Energy, without the chaos"></textarea>'
      + '<label>Icono</label><div class="reset-media-row"><input type="url" name="' + base + '[' + idx + '][icon]" value="" placeholder="https://…" class="regular-text reset-media-url"> <button type="button" class="button reset-media-btn" data-type="image">Subir / elegir</button></div>'
      + '</div>');
    list.append(row);
  });

  $(document).on('click', '.reset-belief-remove', function(e){
    e.preventDefault();
    var list = $(this).closest('.reset-beliefs');
    if (list.find('.reset-product-row').length <= 1) {
      list.find('input, textarea').val('');
      list.find('.reset-preview').remove();
      return;
    }
    $(this).closest('.reset-product-row').remove();
    reindex(list, 'Creencia');
  });
});
