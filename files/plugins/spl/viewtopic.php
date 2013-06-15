<?php

      $user_contacts[] = '<br /><br />';
      
      if ($pun_config['o_spl_view_github'] == '1' AND $cur_post['spl_github'] !='')
      {
        if ($pun_config['o_spl_icon_github'] == '1')
        {
          $user_contacts[] = '<span><a href="https://github.com/'.pun_htmlspecialchars($cur_post['spl_github']).'" rel="nofollow" title="Github"><img src="img/spl/Github-icon.png" /></a></span>';
        }
        else
        {
          $user_contacts[] = '<span class="website"><a href="https://github.com/'.pun_htmlspecialchars($cur_post['spl_github']).'" rel="nofollow">Github</a></span>';
        }
      }

      if ($pun_config['o_spl_view_facebook'] == '1' AND $cur_post['spl_facebook'] !='')
      {
        if ($pun_config['o_spl_icon_facebook'] == '1')
        {
          $user_contacts[] = '<span><a href="https://www.facebook.com/'.pun_htmlspecialchars($cur_post['spl_facebook']).'" rel="nofollow" title="Facebook"><img src="img/spl/Facebook-icon.png" /></a></span>';
        }
        else
        {
          $user_contacts[] = '<span class="website"><a href="https://www.facebook.com/'.pun_htmlspecialchars($cur_post['spl_facebook']).'" rel="nofollow">Facebook</a></span>';
        }
      }

      if ($pun_config['o_spl_view_twitter'] == '1' AND $cur_post['spl_twitter'] !='')
      {
        if ($pun_config['o_spl_icon_twitter'] == '1')
        {
          $user_contacts[] = '<span><a href="https://twitter.com/'.pun_htmlspecialchars($cur_post['spl_twitter']).'" rel="nofollow" title="Twitter"><img src="img/spl/Twitter-icon.png" /></a></span>';
        }
        else
        {
          $user_contacts[] = '<span class="website"><a href="https://twitter.com/'.pun_htmlspecialchars($cur_post['spl_twitter']).'" rel="nofollow">Twitter</a></span>';
        }
      }

      if ($pun_config['o_spl_view_youtube'] == '1' AND $cur_post['spl_youtube'] !='')
      {
        if ($pun_config['o_spl_icon_youtube'] == '1')
        {
          $user_contacts[] = '<span><a href="https://youtube.com/user/'.pun_htmlspecialchars($cur_post['spl_youtube']).'" rel="nofollow" title="Youtube"><img src="img/spl/YouTube-icon.png" /></a></span>';
        }
        else
        {
          $user_contacts[] = '<span class="website"><a href="https://youtube.com/user/'.pun_htmlspecialchars($cur_post['spl_youtube']).'" rel="nofollow">Youtube</a></span>';
        }
      }
?>