$(document).ready(function(){
  $('#search').focus()

  $('#search').on('keyup', function(){
    var search = $('#search').val()
    $.ajax({
      type: 'POST',
      url: '../../PHP/Database/search.php',
      data: {'search': search},
      beforeSend: function(){
        $('#result').html('<img src="../../IMG/pacman.gif">')
      }
    })
    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })

  $('#search-music').on('keyup', function(){
    var search = $('#search-music').val()
    $.ajax({
      type: 'POST',
      url: '../../PHP/Database/search-music.php',
      data: {'search': search},
      beforeSend: function(){
        $('#result').html('<img src="../../IMG/pacman.gif">')
      }
    })
    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    });
  });

});