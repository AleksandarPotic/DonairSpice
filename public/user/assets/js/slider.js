$(function() {
  $('#slides').superslides({
    hashchange: true,
    play: 4000
  });

  $('#slides').on('mouseenter', function() {
    $(this).superslides('stop');
    console.log('Stopped')
  });
  $('#slides').on('mouseleave', function() {
    $(this).superslides('start');
    console.log('Started')
  });
});