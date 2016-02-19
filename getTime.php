//get publish time less actual time
        
        function get_time_ago($date, $prefix, $suffix, $secs, $mins, $hours, $days, $weeks, $years, $error) {
          $date = $item->pubDate;
          $now = time();

          // default message
          if ($date == null) $date = returnPageField(return_page_slug(),'pubDate');
          if ($prefix == null) $prefix = '';
          if ($suffix == null) $suffix = 'ago';
          if ($secs == null) $secs = 'seconds';
          if ($mins == null) $mins = 'minutes';
          if ($hours == null) $hours = 'hours';
          if ($days == null) $days = 'days';
          if ($weeks == null) $weeks = 'weeks';
          if ($years == null) $years = 'years';
          if ($error == null) $error = 'Invalid time stamp';

          //time difference
          $timestamp = strtotime($date);
          $timediff = ($now - $timestamp);

          //outputs the difference
            if ((0 <= $timediff) && (($timediff) < 60)) { $timeago = round($timediff, 0); echo $prefix.' '.$timeago.' '.$secs.' '.$suffix; }
          elseif ((60 <= $timediff) && (($timediff) < 3600)) { ($timeago = round($timediff / 60, 0)); echo $prefix.' '.$timeago.' '.$mins.' '.$suffix; }
          elseif ((3600 <= $timediff) && (($timediff) < 86400)) { ($timeago = round($timediff / 3600, 0)); echo $prefix.' '.$timeago.' '.$hours.' '.$suffix; }
          elseif ((86400 <= $timediff) && (($timediff) < 604800)) { ($timeago = round($timediff / 86400, 0)); echo $prefix.' '.$timeago.' '.$days.' '.$suffix; }
          elseif ((604800 <= $timediff) && (($timediff) < 31449600)) { ($timeago = round($timediff / 604800, 0)); echo $prefix.' '.$timeago.' '.$weeks.' '.$suffix; }
          elseif (31449600 <= $timediff) { ($timeago = round($timediff / 31449600, 0)); echo $prefix.' '.$timeago.' '.$years.' '.$suffix; }
          else echo $error;
        }
        $hours_since_pub = get_time_ago($date, $prefix, $suffix, $secs, $mins, $hours, $days, $weeks, $years);
        
