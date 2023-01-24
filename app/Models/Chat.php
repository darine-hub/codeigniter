require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '137831850feb3f0501f6',
    'c1bf25155a0447870ca4',
    '1542341',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);